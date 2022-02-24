<?php
    namespace app\controllers;

        #[\app\filters\Login] 
        #[\app\filters\Profile]
        class Comment extends \app\core\Controller {

            //shows comment view -> username, comment, options to modify/delete and button to create a new comment
            //format: publication_title by username at timestamp
            public function index($publication_id) { 
                $this->view('Comment/index');
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