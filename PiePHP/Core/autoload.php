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
/**
   * autoload function
   *
   * Charge the given class name
   *
   * use spl_autoload_register()
   *
   * @param string; $class string the name of the called class
   *
   * @return Nothing
   */

function autoload($class) {
  include (file_exists("src/$class.php")) ? "src/$class.php" : "$class.php";
}

spl_autoload_register('autoload');