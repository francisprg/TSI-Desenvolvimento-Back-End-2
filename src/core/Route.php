<?php

namespace CSTSI\Dbe2\core;

use CSTSI\Dbe2\controllers\Controller;
// use CSTSI\Dbe2\app\views\View;

class Route
{

    // localhost:porto/controlers/method/param
    public static function resolve(array $routes): void {
        $uriQuery = self::parseURI(); //ParseURL faz a quebra das rotas

        $class = null;
		$method = null;
		$param = null;
		
		if ($uriQuery) {  //Se houver uma ROTA/URLQUERY
			$class_name = $uriQuery[0]; //$urlquery[0] referindo-se a o elemento de indice 0 no array que seria o nome da classe
			if (count($uriQuery) > 1) { //Contagem, verifica se dentro do URLQUERY  tem mais de um elemento alem  dO controller
				$method = $uriQuery[1]; //Method recebe o metodo que o parse Url quebrou
				$param = (count($uriQuery) > 2) ? $uriQuery[2] : null;
			}

			if (isset($routes[$class_name])) {
				$class = new $routes[$class_name];//produtos
				if ($class instanceof Controller) {
					if ($method && method_exists($class, $method)) {
						if ($param) {
							$class->$method($param);
						} else {
							$class->$method();
						}
					} else {
						if (method_exists($class, 'index'))
							$class->index();
						else $class = null;
					}
				}
			}
		}
		// if (!$class) View::pageNotFound();
		if (!$class) header('HTTP/1.0 404 Not Found');
    }

    private static function parseURI(): array
    {
        if ($_SERVER['REQUEST_URI'] == '/') {
            return [$_SERVER['REQUEST_URI']];
        } else {
            $url_path = trim($_SERVER['REQUEST_URI'], '/');
            error_log("ROUTE: $url_path");
            return explode('/', $url_path);
        }
    }
}
