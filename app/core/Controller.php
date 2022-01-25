<?php
    namespace app\core;
        //TODO: FIX VIEWS THEY'RE UGLY AF
        class Controller {

            public function view($name, $data = []) { 
                if (file_exists('app/views/' . $name . '.php')) //we'll change this to require later on
                    include('app/views/' . $name . '.php');
                else
                    echo 'app/views/' . $name . '.php does not exist';        
            }
        }