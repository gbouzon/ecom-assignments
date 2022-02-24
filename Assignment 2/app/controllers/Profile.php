<?php
    namespace app\controllers;

        class Profile extends \app\core\Controller {

            public function index($profile_id) { //shows profile page -> basic info, publication and comments subviews and modify button
                $this->view('Profile/index', $profile_id);
            }

            public function create() {
                if (!isset($_POST['action'])) {
                    $this->view('Profile/create');
                }
                else {
                    $userProfile = new \app\models\Profile();
                    $userProfile->first_name=$_POST['first_name'];
                    $userProfile->middle_name=$_POST['middle_name'];
                    $userProfile->last_name=$_POST['last_name'];
                    $userProfile->insert(); //FIX INSERT PLS
                    echo "Profile Created";
                }
            }

            #[\app\filters\Profile]
            public function update($profile_id) {
                $profile = new \app\models\Profile();
                $profile = $profile->get($profile_id);
                if (!isset($_POST['action'])) {
                    $this->view('Profile/update', $profile);
                }
                else {
                    $userProfile = new \app\models\Profile();
                    $userProfile->first_name = $_POST['first_name'];
                    $userProfile->middle_name = $_POST['middle_name'];
                    $userProfile->last_name = $_POST['last_name'];
                    $profile->update();
                    header('location:/Profile/index');
                }
            }
        }