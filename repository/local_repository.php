<?php

include_once 'config/connection_database.php';
class LocalRepository{
    
    private $conn;
    
    public function __construct(){
            $this->conn = new DataBaseConnection();
            $this->conn =  $this->conn->getmyDB();
        }
    
    public function getData($query){
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

    // TODO: Manejar error para el constraint unique
     public function create($query){
        try {
        $result = $this->conn->prepare($query);
       if ($result->execute()){
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();    
        }
        return false;
        } catch (PDOExecption $e) {
            print ('Error'.$e->getMessage());
            die();
        }
     }       
            
    public function update($query)
    {
            try {

                $result = $this->conn->prepare($query);
                if ($result->execute()){
                 $result->setFetchMode(PDO::FETCH_ASSOC);
                 return $result->fetchAll();  
                }

            } catch (PDOExecption $e) {
                print ('Error'.$e->getMessage());
                die();
            }
    }
    }


?>