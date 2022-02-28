<?php
    namespace app\controllers;

        #[\app\filters\Profile]
        class Comment extends \app\core\Controller {

            public function index($publication_id) { 
                $myComment = new \app\models\Comment();
                $comments = $myComment->getAllFromPublication($publication_id);
                $this->view('Comment/index', $comments);
            }

            public function create($comment) {
                if (!isset($_POST['action'])) { 
                    $this->view('Comment/create');
                }
                else {  
                    $comment->comment = $_POST['comment'];
                    $comment->insert();
                    header("location:/Publication/index/$comment->publication_id");
                }
            }

            public function update($publication_comment_id) {
                $comment = new \app\models\Comment();
                $comment = $comment->get($publication_comment_id);
                if (!isset($_POST['action'])) {
                    $this->view('Comment/update', $comment);
                }
                else {
                    $comment->comment = $_POST['comment'];
                    $comment->update($publication_comment_id);
                    header("location:/Publication/index/$comment->publication_id");
                }
            }

            public function delete($publication_comment_id) {
                $comment = new \app\models\Comment();
                $comment = $comment->get($publication_comment_id);
                $comment->delete($publication_comment_id); //only if belongs to specific person (must be logged in)
                header("location:/Publication/index/$comment->publication_id");
            }
        }