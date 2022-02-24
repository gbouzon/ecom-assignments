<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() { //displays publications sorted by date
                $myPublication = new \app\models\Publication();
                $profile = (isset($_SESSION['user_id'])) ? $myPublication->getProfile($_SESSION['user_id']) : false;
                $profile_id = ($profile) ? $profile->profile_id : false;

                $publications = ($profile_id) ? $myPublication->getAll($profile_id) : $myPublication->getAllPublic();
                $this->view('Main/index', $publications);
            }
        }