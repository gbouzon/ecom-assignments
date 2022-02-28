<?php
    namespace app\controllers;

        class Publication extends \app\core\Controller { //DO CHECKS -> USER VALIDATION

            //shows publications page -> publication title and user associated to it and timestamp
            //comments subview and modify/delete button
            //format: publication_title by username at timestamp
            public function index($publication_id) { 
                $myPublication = new \app\models\Publication();
                $publication = $myPublication->get($publication_id);
                $this->view('Publication/index', $publication);
            }

            #[\app\filters\Profile]
            public function create($profile_id) {
                if (!isset($_POST['action'])) {	//display he view if I don't submit the form
                    $this->view('Publication/create');
                }
                else {	//process the data when the form has been submitted, id, title, text
                    $newPublication = new \app\models\Publication();
                    $newPublication->publication_title = $_POST['publication_title'];
                    $newPublication->publication_text = $_POST['publication_text'];
                    $newPublication->publication_status = $_POST['publication_status'];
                    $newPublication->profile_id = $profile_id;
                    $newPublication->insert($profile_id);
                    header('location:/Main/index');
                }
            }

            #[\app\filters\Profile]
            public function update($publication_id) { //check profile id: validation
                $publication = new \app\models\Publication();
                $publication = $publication->get($publication_id); //get the specific publication
                if (!isset($_POST['action'])) {
                    $this->view('Publication/update', $publication);
                }
                else {
                    $publication->publication_title = $_POST['publication_title'];
                    $publication->publication_text = $_POST['publication_text'];
                    $publication->publication_status = $_POST['publication_status'];
                    $publication->update();
                    header("location:/Publication/index/$publication->publication_id");
                }
            }

            #[\app\filters\Profile] 
            public function delete($publication_id) { //check profile id: validation purposes
                $publication = new \app\models\Publication();
		        $publication->delete($publication_id); //only if belongs to specific person (must be logged in)
		        header('location:/Main/index');
            }
        }