<?php

define("DB_HOST", "localhost");
define("DB_DATABASE", "bebidad_proyecto_desarrollo_web");
define("DB_USER", "root");
define("DB_PASSWORD", "");

    class DataBaseConnection{       

        private $conn;


        public function __construct(){
                try {
                    $this->conn = new PDO('mysql:host='.DB_HOST.";dbname=".DB_DATABASE,DB_USER, DB_PASSWORD);
                    // self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                    
                } catch (PDOException $e) {
                    echo 'No es posible connectare a la base de datos '. $e->getMessage();
                    die();
                }
                return $this->conn;
        }


        public function getmyDB(){
        if ($this->conn instanceof PDO)
            {
            return $this->conn;
            }
        }
        

        
    }
?>