<?php

require '../vendor/autoload.php';

use CSTSI\Dbe2\controllers\Controller;
use CSTSI\Dbe2\core\App;

Controller::ola();
echo "<br>";
var_dump(Controller::class);

App::handleEnv();