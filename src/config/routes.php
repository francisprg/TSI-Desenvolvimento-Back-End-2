<?php

use CSTSI\Dbe2\controllers\AutorController;
use CSTSI\Dbe2\controllers\LivroController;
use CSTSI\Dbe2\controllers\ResenhaController;

$routes = [
     '/'=> LivroController::class,
    'livros'=> LivroController::class,
    'resenhas' => ResenhaController::class,
    'autores' => AutorController::class
];