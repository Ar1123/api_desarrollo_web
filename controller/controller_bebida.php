

<?php

    include_once 'repository/local_repository.php';





    class BebidaCrudImpl  extends Crud{

        private $conn;    
        public function __construct(){
                $this->conn = new DataBaseConnection();
                $this->conn =  $this->conn->getmyDB();
            }

        public function create($body){
            try{

                $query = 'INSERT INTO bebida (cod_categoria, cantidad, descripcion, nombre_bebida, volumen, marca, descuento, url, puntuacion,grado_acohol) 
                VALUES(:cod_categoria, :cantidad, :descripcion, :nombre_bebida, :volumen, :marca, :descuento, :url, :puntuacion,:grado_acohol)';
                $stmt = $this->conn->prepare($query);
    
                foreach ($body as $key => $value) {
                $stmt->bindValue(':'.$key, $value);
                }
    
                return $stmt->execute();     
            }   catch(PDOExceprion $e){
                print ('Error'.$e->getMessage());
                die();
            }
        }

        public function readAll(){
            $query = 'SELECT * FROM bebida';   
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
                $query = 'SELECT * FROM bebida WHERE id_bebida = :id';     
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
            $query = 'UPDATE  bebida SET 
            cod_categoria = :cod_categoria, cantidad  = :cantidad, 
            descripcion  = :descripcion, nombre_bebida = :nombre_bebida, 
            volumen = :volumen, marca = :marca, descuento = :descuento, 
            url = :url, puntuacion = :puntuacion,grado_acohol = :grado_acohol WHERE id_bebida = :id';

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
        public function delete($id){
            $query = 'DELETE FROM bebida WHERE id_bebida = :id';
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