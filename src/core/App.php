<?php

namespace CSTSI\Dbe2\core;

use Dotenv\Dotenv;

class App
{
    public static function handleEnv()
    {
        $dotenv = Dotenv::createImmutable(__DIR__."/../../");
        $dotenv->load();
        echo "<br>Conectar no banco de nome: " . $_ENV['DB_NAME'];
    }
}