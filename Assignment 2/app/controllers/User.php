<?php
    namespace app\controllers;

        #[\app\filters\Login]    
        class User extends \app\core\Controller {

            public function register() {
                $this->view('User/register');
            }

            public function login() {
                $this->view('User/login');
            }
        }