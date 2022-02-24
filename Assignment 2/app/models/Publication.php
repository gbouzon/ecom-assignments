<?php
    namespace app\models;

        class Publication extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($publication_id) {
                $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
                return $STMT->fetch(); //fetch is what we use to return one record that match the statement
            }

            function getAllPublic() { //fetches all public publications
                $SQL = 'SELECT * FROM publication WHERE publication_status = 0'; //because 0 is public
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
               // var_dump($STMT->fetchAll());
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            function getAll($profile_id) { //all public and private publications (only if made by the same user)
                $SQL = 'SELECT * FROM `publication` WHERE publication_status = 0
                        UNION 
                        SELECT * FROM `publication` WHERE publication_status = 1 AND profile_id = :profile_id;';

                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
               // var_dump($STMT->fetchAll());
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            public function getProfile($profile_id) {
                $SQL = 'SELECT * FROM profile WHERE profile_id = :profile_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$profile_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
                return $STMT->fetch(); //fetch is what we use to return one record that match the statement
            }

            function getUser($user_id) {
                $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['user_id'=>$user_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
                return $STMT->fetch(); //fetch is what we use to return one record that match the statement
            }

            Function insert() { //fix this and subsequent calls
                $SQL = 'INSERT INTO publication(profile_id, publication_title, publication_text, publication_status) 
                VALUES(:profile_id, :publication_title, :publication_text, :publication_status)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['profile_id'=>$this->profile_id, 'publication_title'=>$this->publication_title, 
                'publication_text'=>$this->publication_text, 'publication_status'=>$this->publication_status]);
            }
    
            function update() {
                $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, 
                publication_status = :publication_status WHERE profile_id = :profile_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_title'=>$this->publication_title, 'publication_text'=>$this->publication_text, 
                'publication_status'=>$this->publication_status, 'profile_id'=>$this->profile_id]);
            }
    
            function delete($publication_id) {
                $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['publication_id'=>$publication_id]);
            }
        }