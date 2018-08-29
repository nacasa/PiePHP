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

namespace Controller;
use Core\Controller;

class ErrorController extends Controller {
    
  public function existAction() {
        $this -> render("404");
  }
}