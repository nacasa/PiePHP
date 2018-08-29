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

class Database{
  public static $db;
  public static function config($config) {
    try
    {
      self::$db =  new \PDO('mysql:host='.$config->HOST.';dbname='.$config->DBNAME.';charset=utf8', $config->USERNAME, $config->PASSWORD);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
  }
  public static function getDB() {
    return self::$db;
  }
}


