<?php
    namespace app\controllers;

        class Contact extends \app\core\Controller {

            public function index() {
                if (isset($_POST['action'])) {
                    $dataToWrite = ['author'=>$_POST['email'], 'message'=>$_POST['message']];
                    $stringToWrite = json_encode($dataToWrite);
                    $fileHandle = fopen('log.txt', 'a');
                    flock($fileHandle, LOCK_EX);
                    fwrite($fileHandle, $stringToWrite . "\n");
                    fclose($fileHandle);
                }
                $this->view('Contact/index');
            }

            public function read() { //works
                if (file_exists('log.txt')) { 
                    $messages = file('log.txt');
                    $this->view('Contact/read', $messages);
                }
                else 
                    $this->view('Contact/read');
            }
        }