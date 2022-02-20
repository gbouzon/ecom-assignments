<?php
    namespace app\controllers;

        class Profile extends \app\core\Controller {

            public function index() { //shows profile page -> basic info, publication and comments subviews and modify button
                $this->view('Profile/index');
            }

            public function create() {
                $this->view('Profile/create');
            }

            public function update() {
                $this->view('Profile/update');
            }
        }