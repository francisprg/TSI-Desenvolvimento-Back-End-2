<?php

require '../vendor/autoload.php';

use CSTSI\Dbe2\controllers\Controller;
use Dotenv\Dotenv;


Controller::ola();
echo "<br>";
var_dump(Controller::class);

//TODO: Criar uma classe para ler e imprimir o valor do ENV.
// Implementar como método estático
// A classe deve estar em um diretório diferente da controllers
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "<br>Conectar no banco de nome: ".$_ENV['DB_NAME'];