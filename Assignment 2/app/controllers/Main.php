<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //displays publications sorted by date
                $myPublication = new \app\models\Publication();
                $publications = $myPublication->getAllPublic();
                $this->view('Main/index', $publications);
            }
        }