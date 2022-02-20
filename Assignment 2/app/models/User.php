<?php
    namespace app\models;

        class User extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($user_id) {
                
            }

            function getUserProfile($user_id) { //get profile from user? question marrk>>>
                $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                echo $STMT->fetch();
                return $STMT->fetch();
            }
        }