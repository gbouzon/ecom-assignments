<?php
    namespace app\controllers;

        class Count extends \app\core\Controller { 

            public function index() {
                if (file_exists('public/files/counter.txt')) {
                    $fileHandle = fopen('public/files/counter.txt', 'r');
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

                $fileHandle = fopen('public/files/counter.txt', 'w');
                flock($fileHandle, LOCK_EX);
                fwrite($fileHandle, $counter);
                fclose($fileHandle);
            }
        }
