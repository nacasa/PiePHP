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

session_start();

define('BASE_URI', str_replace('\\', '/', substr(__DIR__,
strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

$config = json_decode(file_get_contents("config.json"));
Core\Database::config($config);

$app = new Core\Core();
$app->run();

