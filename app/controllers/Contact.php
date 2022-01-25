<?php
    namespace app\controllers;

        class Contact extends \app\core\Controller {

            public function index() {
                //TODO: finish implementation
                $this->view('Contact/index');
            }

            public function read() { //works 
                $messages = file('log.txt');
                $this->view('Contact/read', $messages);
            }
        }