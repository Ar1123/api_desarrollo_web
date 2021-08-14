<?php
    class DataBaseConnection{       

        private $conn;
        private $host           = 'localhost';
        private $database_name  = 'bebidad_proyecto_desarrollo_web';
        private $username       = 'root';
        private $password       = '';

        public function __construct(){
                try {
                    $this->conn = new PDO('mysql:host='.$this->host.";dbname=".$this->database_name,$this->username, $this->password);
                } catch (PDOException $e) {
                    echo 'No es posible connectare a la base de datos '. $e->getMessage();
                }
                return $this->conn;
        }


        public function getmyDB()
        {
        if ($this->conn instanceof PDO)
            {
            return $this->conn;
            }
        }
        
        // public function getConnection(){
        //         $this->conn = null;
        //         try {
        //             $this->conn = new PDO('mysql:host='.$this->host.";dbname=".$this->database_name,$this->username, $this->password);
        //                 $this->conn->exec('set names utf8');
        //         } catch (PDOException $e) {
        //             echo 'No es posible connectare a la base de datos '. $e->getMessage();

        //         }
        //             return $this->conn;
        // }

        
    }
?>