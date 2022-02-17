<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //displays publications sorted by date
                $this->view('Main/index');
            }
        }