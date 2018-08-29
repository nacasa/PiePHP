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
use Core\Request;

class Controller {

  protected static $_render;
  protected $request;

  public function  __construct() {
    $this->request = new Request();
  }

  public function __destruct() {
      echo self::$_render;
  }

  protected function render($view, $scope = []) {
    extract($scope);
    $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
    str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

    if (file_exists($f)) {
      ob_start();
      include($f);
      $view = ob_get_clean();
      ob_start();
      include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View','index']) . '.php');
      self::$_render = ob_get_clean();
    }

  }
}