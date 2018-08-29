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

class ORM {

   private $db;

   function  __construct($db) { 
      $this->db = $db;
   }

   private function insert_prepare($in) {
      $count = 0;
      $insert = "(";

      foreach ($in as $key => $value) {
         $insert .=  (++$count == count($in) - 1) ? "`".$key."`," : "`".$key."`";
      }

      $insert .= ") VALUES (";
      $count = 0;

      foreach ($in as $key => $value) {
         $insert .= (++$count == count($in) - 1) ? ":".$key.", " : ":".$key."";
      }

      $insert .= ")";
      return $insert;
   }

   private function insert_execute($in) {
      $tab = [];

      foreach ($in as $key => $value) {
         $tab[$key] = $value;
      }

      return $tab;
   }

   private function update_prepare($fields) {
      $count = 0;
      $update = "SET ";

      foreach ($fields as $key => $value) {
         $update .= (++$count == count($fields) - 1) ? $key." = :".$key.", " : $key." = :".$key." ";
      }

      $update .= "WHERE id = :id";
      return $update;
   }

   public function create ($table, $fields) {            // return a id
      $insert = $this->insert_prepare($fields);
      $bind = $this->insert_execute($fields);
      $reponse = $this->db->prepare("INSERT INTO ".$table." ".$insert."");
      
      if($reponse->execute($bind)) {
         return $this->db->lastInsertId();

      } else {
         echo 'Erreur sql, vérifier la cohérence de la base de données (table, champs, données)';
      }

   } 

   public function read ($table, $id) {                  // returne an array
      $select = "WHERE id = :id";
      $reponse = $this->db->prepare("SELECT * FROM ".$table." ". $select."");

      if($reponse->execute(array('id' => $id))) {

         if($row = $reponse->fetchAll()) {
            return $row;
         }

      } else {
         echo 'Erreur sql, vérifier la cohérence de la base de données (table, champs, données)';
      }

   }

   public function update ($table, $id, $fields) {       // return true or false
      $update = $this->update_prepare($fields);
      $reponse = $this->db->prepare("UPDATE ".$table." ".$update."");

      if($reponse->execute(array('id' => $id))){
         return true;
      }

      return false;
   } 

   public function delete ($table, $id) {              
      $delete = "WHERE id = :id";
      $reponse = $this->db->prepare("DELETE FROM ".$table." ".$delete."");

      if($reponse->execute(array('id' => $id))){
         return true;
      }

      return false;
   } 

   public function find ($table, $params = array( 'WHERE' => '1', 'ORDER BY' => 'id desc', 'LIMIT' => '')) {
      $select = "SELECT * FROM ".$table." ";
      $bind = [];
      $count = 0;

      foreach ($params as $key => $value) {

         if($value != ""){
            $select .= $key." ".$value." ";
         }

      }

      if($reponse = $this->bdd->query($select)) {
         return $reponse->fetchAll();
      
      } else {
         echo 'Erreur sql, vérifier la cohérence de la base de données (table, champs, données)';
      }
   } 
}
