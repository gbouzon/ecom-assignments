<?php
    namespace app\core;

        class App {

            //definition of private variables
            private $controller = 'Main'; 
            private $method = 'index';

            //definition of a constructor
            public function __construct() {
                $url = self::parseUrl();

                if (isset($url[0])) {
                    if (file_exists('app/controllers/' . $url[0] . '.php')) {
                        $this->controller = $url[0];
                    }
                    //consumes url
                    unset($url[0]); 
                }

                $this->controller = 'app\\controllers\\' . $this->controller;
                $this->controller = new $this->controller; 

                if (isset($url[1])) {
                    if (method_exists($this->controller, $url[1])) 
                        $this->method = $url[1];

                    unset($url[1]);
                }

                $this->params = $url ? array_values($url) : []; // if url isn't null we're calling array_values method, otherwise params are empty
                call_user_func_array([$this->controller, $this->method], $this->params);
            }

            private static function parseUrl() { //fix this later, maybe
                if (isset($_GET['url'])) {
                    return explode(
                        '/', 
                        filter_var(
                            rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL
                        )
                    );
                }
            }
        }