<?php
    namespace app\controllers;

        class Publication extends \app\core\Controller {

            //shows publications page -> publication title and user associated to it and timestamp
            //comments subview and modify/delete button
            //format: publication_title by username at timestamp
            public function index($publication_id) { 
                $myPublication = new \app\models\Publication();
                $publication = $myPublication->get($publication_id);
                $this->view('Publication/index', $publication);
            }

            public function create() {
                $this->view('Publication/create');
            }

            public function update() {
                $this->view('Publication/update');
            }

            public function delete() {
            }
        }