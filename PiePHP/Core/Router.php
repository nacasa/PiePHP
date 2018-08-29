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

class Router {
  
  private static $routes;

  public static function connect ($url, $route) {
    self::$routes[$url] = $route;
      
  }

  public static function get ($url) {
    return (array_key_exists($url, self::$routes)) ? self::$routes[$url] : self::$routes["/404"];
  }
}
