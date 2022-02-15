<?php

//not yet a full psr-4 autoloader,  
spl_autoload_register( //will be invoked when a class needs to be included
    function ($class_name) { 
        require_once($class_name . '.php'); 
    }
);