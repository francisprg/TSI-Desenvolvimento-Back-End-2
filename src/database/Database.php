<?php

namespace CSTSI\Dbe2\database;

use stdClass;
use PDO;
use PDOException;
use Exception;

class Database
{
    private static ?PDO $instance = null;
    private static stdClass $db;


    private function __construct() {}
    private function __clone() {}


    public static function getInstance(): PDO
    {
        if (!isset(self::$instance)) {
            try {
                self::readEnv();
                $dsn = self::getDsn();
                self::$instance = new PDO($dsn, self::$db->user, self::$db->pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $error) {
                // var_dump(
                //     "CONNECTION",
                //     [
                //         $error->getMessage(),
                //         $error->getTraceAsString()
                //     ]
                // );
                throw new Exception($error->getMessage());
            }
        }
        return self::$instance;
    }




    private static function readEnv(): void
    {
        $db = new stdClass();
        $db->host = $_ENV['DB_HOST'];
        $db->drive = $_ENV['DB_DRIVE'];
        $db->name = $_ENV['DB_NAME'];
        $db->port = $_ENV['DB_PORT'] ?? '';
        $db->user = $_ENV['DB_USER'];
        $db->pass = $_ENV['DB_PASS'];
        $db->charset = isset($_ENV['DB_CHARSET']) ? $_ENV['DB_CHARSET'] : 'UTF8';
        self::$db = $db;
        if (!self::$db) {
            throw new Exception("Erro ao ler arquivo de configuração!");
        }
    }

    private static function getDsn(): string
    {
        switch (self::$db->drive) {
            case 'mysql':
            case 'mariadb':
                $dsn = "mysql:host=" . self::$db->host . ";"
                    . "dbname=" . self::$db->name . ";"
                    . "charset=" . self::$db->charset;
                $port = self::$db->port ?? 3306;
                $dsn .= ";port=$port";
                break;
            case 'pgsql':
                $dsn = "pgsql:host=" . self::$db->host . ";"
                    . "dbname=" . self::$db->name . ";";
                $port = self::$db->port ?? 5432;
                $dsn .= ";port=$port";
                break;
            default:
                throw new Exception("Driver " . self::$db->drive . " não suportado!");
        }
        return $dsn;
    }


    public static function isTablesInstalled(): bool
    {
        $sql = "SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'";
        $stmt = self::getInstance()->query($sql);
        $tabelas = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return !empty($tabelas);
    }

    private static function installDB(): void
    {
        try {
            $scriptSQL = __DIR__ . "/dumps/pgsql_liaqui.sql";
            $sql = file_get_contents($scriptSQL);
            if ($sql === false) throw new Exception("Erro ao ler arquivo de dump.");

            self::getInstance()->exec($sql);

            error_log("Banco de dados instalado com sucesso!");
        } catch (Exception $error) {
            error_log("Erro ao instalar banco: " . $error->getMessage());
        }
    }
}   