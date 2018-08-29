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
   
use Core\Router;

Router::connect('/', ['controller' => 'user', 'action' => 'index']);
Router::connect('/404', ['controller' => 'error', 'action' => 'exist']);
Router::connect('/user/logIn', ['controller' => 'user', 'action' => 'logIn']);
Router::connect('/user/register', ['controller' => 'user', 'action' => 'register']);
