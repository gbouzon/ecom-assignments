<?php
    namespace app\controllers;

        #[\app\filters\Profile]
        class Comment extends \app\core\Controller {

            public function index($publication_id) { 
                $myComment = new \app\models\Comment();
                $comments = $myComment->getAllFromPublication($publication_id);
                $this->view('Comment/index', $comments);
            }

            public function create($profile_id, $publication_id) {
                if (!isset($_POST['action'])) { //display he view if I don't submit the form
                    $this->view('Comment/create');
                }
                else {  //process the data when the form has been submitted, id, title, text
                    $newComment = new \app\models\Comment();
                    $newComment->profile_id = $profile_id;
                    $newComment->publication_id = $publication_id;
                    $newComment->comment = $_POST['comment'];
                    $newComment->insert();
                }
            }

            public function update($publication_comment_id) {
                $comment = new \app\models\Comment();
                $comment = $comment->get($publication_comment_id); //get the specific publication
                if (!isset($_POST['action'])) {
                    $this->view('Comment/update', $comment);
                }
                else {
                    $comment->comment = $_POST['comment'];
                    $comment->update();
                    header("location:/Publication/index/$publication->publication_id");
                }
            }

            public function delete($publication_comment_id) {
                $comment = new \app\models\Comment();
                $comment->delete($publication_comment_id); //only if belongs to specific person (must be logged in)
                header('location:/Main/index');
            }
        }