<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() {
                $this->view('Main/index');
            }

            public function about_us() {
                $this->view('Main/about_us');
            }

            public function count() {
                if (file_exists('counter.txt')) {
                    $fileHandle = fopen('counter.txt', 'r');
                    flock($fileHandle, LOCK_SH);
                    $counter = fread($fileHandle, 1024);
                    fclose($fileHandle);
                }
                else 
                    $counter = '{"count":0}';

                $dCounter = json_decode($counter);
                $dCounter->count++;
                $counter = json_encode($dCounter);
                echo $counter;

                $fileHandle = fopen('counter.txt', 'w');
                flock($fileHandle, LOCK_EX);
                fwrite($fileHandle, $counter);
                fclose($fileHandle);
            }
        }