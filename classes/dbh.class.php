<?php

/**
 * Database Handler
 * Using the MVC Pattern
 */
    class Dbh{
        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DBNAME = "sekani_db";

        protected function connect(){
            $dsn = "mysql:host=".$this->HOST.";dbname=".$this->DBNAME;
            try {
                $pdo = new PDO($dsn, $this->USERNAME, $this->PASSWORD);
            } catch (Exception $th) {
                echo"Error: ".$th->getMessage();
            }
            return $pdo;
        }
    }