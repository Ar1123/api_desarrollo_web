<?php

include_once 'config/connection_database.php';

class LocalRepository{    
    
    private $conn;    
    public function __construct(){
            $this->conn = new DataBaseConnection();
            $this->conn =  $this->conn->getmyDB();
        }
    
    public function getAllData($query){
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
    public function getDataById($query, $id){
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
            } catch (PDOExecption $e) {
                print ('Error'.$e->getMessage());
                die();
            }
        }       

        //funcion general para cualquier accion de insertar datos
        public function create($body, $query){
        try{

            $stmt = $this->conn->prepare($query);

            foreach ($body as $key => $value) {
            $stmt->bindValue(':'.$key, $value);
            }

            return $stmt->execute();     
        }catch(PDOExceprion $e){
            print ('Error'.$e->getMessage());
            die();
                }
 
     }       

     //funcion general para cualquier accion de actualizar datos
            
    public function update($body, $id, $query)
    {   
        try {
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id', $id);
                 foreach ($body as $key => $value) {    //se toman el key y el value de cada posicion en el json suministrado por el usuario
                    $stmt->bindValue(':'.$key, $value);
                } 
            return $stmt->execute();               
            } catch (PDOExecption $e) {
                print ('Error'.$e->getMessage());
                die();
            }
    }

    public function delete($query, $id)
    {
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id', $id);
                return $stmt->execute();
            } catch (PDOExecption $e) {

                print ('Error'.$e->getMessage());
                die();
            }
    }
    }


?>