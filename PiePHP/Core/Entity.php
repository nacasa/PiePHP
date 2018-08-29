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

class Entity {

   public $orm;
   protected $db;
   protected $param;
   protected $table;

   function  __construct($param) { 
      $this->table = $this->modelName();
      $this->orm = new ORM(Database::getDB());
      $this->db = Database::getDB();
      $this->param = $param;
      
      foreach($param as $key => $value) {
         $this->{$key} = $value;
      }
    }

   public function save() {
      $this->orm->create($this->table,$this->param);
   }

   public function modelName() {
      return strstr(substr(strstr(get_called_class(), "\\"),1), "Model",true);
   }

}  