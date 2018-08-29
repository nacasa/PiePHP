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
use Model;

class UserController extends Controller {

    public function indexAction() {
        echo "Ok, ca marche!!";
    }

    public function addAction() {
        echo "Ok, ca marche!!";
    }

    public function logInAction() {
        $param = $this->request->getQueryParams();

        if(!$param) {
            $this -> render("login");

        } else {
            $register = new Model\UserModel($param);

            if($register -> checkAuth()) {
                var_dump("Vous êtes connecté");
            
            } else {
                var_dump("l'email et/ou le mot de passe rentrés sont invalides");
            }
        }
    }

    public function registerAction() {
        $param = $this->request->getQueryParams();

        if(!$param) {
            $this -> render("register");
        
        } else {
            $register = new Model\UserModel($param);
            $register->save();
        }
    }
}

