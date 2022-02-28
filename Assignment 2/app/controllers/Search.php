<?php
    namespace app\controllers;

        class Search extends \app\core\Controller {

            private $publication = new \app\models\Publication();
            private $publicationsArray = $publication->getAllPublic();

            private function updatePublications() {
                $publicationsArray = $publication->getAllPublic();
            }

            public function searchByTitle() {
                $matchingPubs = array();
                if (isset($_POST['action'])) {
                    for ($i = 0; $i < count($publicationsArray); $i++) {
                        if (str_contains($publicationsArray[$i]->publication_title, $_POST['search']))
                            array_push($matchingPubs, $publicationsArray[$i]);
                    }
                    $this->view('subviews/search', $matchingPubs);
                }
            } 

            public function searchByContent() {
                $matchingPubs = array();
                if (isset($_POST['action'])) {
                    for ($i = 0; $i < count($publicationsArray); $i++) {
                        if (str_contains($publicationsArray[$i]->publication_text, $_POST['search']))
                            array_push($matchingPubs, $publicationsArray[$i]);
                    }
                    $this->view('subviews/search', $matchingPubs);
                }
            }
        }