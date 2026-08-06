<?php

require '../vendor/autoload.php';

use CSTSI\Dbe2\controllers\Controller;
use Dotenv\Dotenv;


Controller::ola();
echo "<br>";
var_dump(Controller::class);

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "<br>Conectar no banco de nome: ".$_ENV['DB_NAME'];