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

namespace Model;
use Core\Entity;

class UserModel extends Entity {

    public function checkAuth() {
        $reponse = $this->db->prepare("SELECT password FROM ".$this->table." WHERE email = ?");

        if($reponse->execute(array($this->email))) {

            while ($row = $reponse->fetch()) {

                if($this->password == $row['password'])
                    return true;
            }
        }
        return false;
    }
}