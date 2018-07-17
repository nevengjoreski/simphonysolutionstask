<?php

class Database{
    protected $db;

    function __construct(){

        if(file_exists(__DIR__.'/config.json')){

            $file_content = file_get_contents(__DIR__.'/config.json');
            $db_content = json_decode($file_content);

            try {

                $connection_string = "mysql:host={$db_content->database->host};dbname={$db_content->database->dbname}";
                $username = $db_content->database->username;
                $password = $db_content->database->password;

                $this->db = new PDO($connection_string, $username, $password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        } else {

            echo "No DB configuration file !!!";

        }
    }
}

