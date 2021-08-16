

<?php

include_once 'repository/local_repository.php';





class CategoriaCrudImpl  extends Crud{

    private $conn;    
    public function __construct(){
            $this->conn = new DataBaseConnection();
            $this->conn =  $this->conn->getmyDB();
        }

    public function create($body){
        try{

            $query = 'INSERT INTO categoria ( nombre_categoria) 
            VALUES(:nombre_categoria)';
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':nombre_categoria', $body['nombre_categoria']);            

            return $stmt->execute();     
        }   catch(PDOExceprion $e){
            print ('Error'.$e->getMessage());
            die();
        }
    }

    public function readAll(){
        $query = 'SELECT * FROM categoria';   
        try {

                $stm = $this->conn->prepare($query);
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC);
                return $stm->fetchAll();
                
            }  catch(PDOExceprion $e){
                print ('Error'.$e->getMessage());
                die();
            }
    }
    public function readById($id){
     
        try {
            $query = 'SELECT * FROM categoria WHERE cod_categoria = :id';     
            $stm = $this->conn->prepare($query);
            $stm->bindParam(':id', $id);
            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);
            return $stm->fetch();
        } catch(PDOExceprion $e){
            print ('Error'.$e->getMessage());
            die();
        }

        
    }
    public function update($body, $id){
        $query = 'UPDATE  categoria SET 
        nombre_categoria = :nombre_categoria  WHERE cod_categoria = :id';
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nombre_categoria', $body['nombre_categoria']);
            return $stmt->execute();                
        } catch (PDOExecption $e) {
            print ('Error'.$e->getMessage());
            die();
        }
    }
    public function delete($id){
        $query = 'DELETE FROM categoria WHERE cod_categoria = :id';
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