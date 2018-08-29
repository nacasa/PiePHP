<?php
/**
 * This file is part of the PiePHP Framwork.
 *
 * PHP Version 7.2.1
 *
 * @category Framework
 * @package  PiePHP
 * @author   NCSAFA <nawel.camille.safa@epitech.eu>
 *
 */

namespace Core;
require_once("routes.php");

class Core {

	public function run() {		
		$url = "";
		$tab_url = array_filter(explode("/", trim($_SERVER['REQUEST_URI'])));
		array_shift($tab_url);

		if((count($tab_url) == 0)) {
			$url = "/" ;
		
		} else {

			foreach ($tab_url as $value) {
				$value = strpos($value, "?") ? strstr($value, "?" , true) : $value;
				$url .= '/'.$value;
			}

		}

		$url = Router::get($url);
		$this->getUrl($url);
	}
	
	public function getUrl($url) {		
		$controller = "Controller\\".ucfirst($url["controller"])."Controller";
		$action = $url["action"]."Action";
		$call_controller = new $controller();
        $call_controller -> {$action}();
	}
}
