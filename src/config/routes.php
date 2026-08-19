<?php

use CSTSI\Dbe2\controllers\HomeController;
use CSTSI\Dbe2\controllers\LivroController;

$routes = [
    '/'=> HomeController::class,
    'livros'=> LivroController::class,
];