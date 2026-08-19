<?php

class Database
{


    //18-08-2025 operador ? querendo dizer que apenas pode ser null ou uma instancia da classe PDO 
    private static ?PDO $instance = null;

    //18-08-2025 Criacao de um construct com private para evitar a criacao de uma instancia da classe Database();
    private function __construct() {}

    //18-08-2025 Criacao de um __clone com private para evitar a clonagem de uma instancia da classe Database();
    private function __clone() {}

    public static function getConnection(): PDO
    {
        // 18-08-2025 Interessante, pela propiedade INSTANCE ser static temos que utilizar o SELF para acessa-la, pois nao é parte de uma instancia de objeto e sim da classe em si
        if (self::$instance == null) {
            try {
                $host = 'app_db';      // nome do serviço do banco na rede "app_net"
                $port = '5432';         // porta INTERNA do container do Postgres
                $dbname = getenv('DB_NAME');
                $user = getenv('DB_USER');
                $password = getenv('DB_PASS');

                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

                self::$instance = new PDO($dsn, $user, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                error_log("Erro de conexao: " . $e->getMessage());
                die("Erro ao conectar ao banco de dados");
            }
        }

        return self::$instance;
    }
}
