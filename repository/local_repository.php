
<?php

include_once 'config/connection_database.php';
class LocalRepository{
    

        private $conn;

        public function __construct()
        {
            $this->conn = new DataBaseConnection();
            $this->conn =  $this->conn->getmyDB();
        }
        public function getAll($query){
            try {
                $result = $this->conn->prepare($query);
                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);
                return $result->fetchAll();
            } catch (PDOExecption $e) {
                print ('Error'.$e->getMessage());
                die();
            }
        }       
    }

?>