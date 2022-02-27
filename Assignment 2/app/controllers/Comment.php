<?php
    namespace app\controllers;

        #[\app\filters\Login] 
        #[\app\filters\Profile]
        class Comment extends \app\core\Controller {

            public function index($profile_id, $publication_id) { 
                if (!isset($_POST['action'])) { //display he view if I don't submit the form
                    $this->view('Comment/create');
                }
                else {  //process the data when the form has been submitted, id, title, text
                    $newComment = new \app\models\Publication();
                    $newComment->profile_id = $profile_id;
                    $newComment->publication_id = $publication_id;
                    $newComment->comment = $_POST['comment'];
                    date_default_timezone_set('Canada/Quebec');
                    $newComment->timestamp = time();
                    $newComment->insert($profile_id);
                    header('location:/Main/index');
                }
            }

            public function create($profile_id, $publication_id) {
                $this->view('Comment/create');
            }

            public function update($publication_comment_id) {
                $this->view('Comment/update');
            }

            public function delete($publication_comment_id) {
            }
        }