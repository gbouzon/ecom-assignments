<?php
    namespace app\filters;

        #[\Attribute]
        class Login {

            function execute() {
                if (!isset($_SESSION['user_id'])) { //user is not logged in
                    header('location:/User/index'); //check if it's uppercase later
                    return true; //I want to indicate to the framework that the user is filtered
                }
                else if (isset($_SESSION['user_id']) && )
                //if you are logged in, check if profile has been completed
                //if profile_id exists -> record has been created (non null)
                //get the record using user_id (unique fk in profile table)

                return false;
            }
        }