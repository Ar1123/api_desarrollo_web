

<?php

    include_once 'repository/local_repository.php'; 
    include_once 'helpers/response_helper.php';

    class ApiBebidas{


        private $repository;
        private $response;    
        public function __construct(){
            $this->repository = new LocalRepository();
            $this->response = new Response();
        }

        public function getQuety($types){
           
           
            switch( $_SERVER['REQUEST_METHOD']){

                case 'GET':               
                    $this->getBebida(); 
                    break;
                case 'POST':
                    $this->createBebida();
                    break;
                case 'PUT':
                        $this->update();
                    break;
                case 'DELETE':
                        echo 'DELETE';
                    break;
                        
            }
        }

        private  function getBebida(){
            $query;
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query =  'SELECT * FROM bebida where id_bebida ='. $id;

            }else{
                $query =  'SELECT * FROM bebida';
            }
            $result  =    $this->repository->getData($query);
            $this->response->response(
                       true, 
                       'Consula exitosa',
                        200,
                        $result);
        }
        
        private function createBebida(){
            $postBody = file_get_contents('php://input');
            echo $postBody;
            $data = json_decode($postBody,true);   
                if(
                !isset($data['cantidad'])     || !isset($data['cod_categoria']) || 
                !isset($data['descripcion'])  || !isset($data['descuento'])     ||
                !isset($data['grado_acohol']) || !isset($data['marca'])         ||
                !isset($data['nombre'])       || !isset($data['puntuacion'])    ||
                !isset($data['url']) ){
                    $this->response->response(
                        false, 
                        'Faltan datos',
                         400,
                         []);
                }else{
                    $query = "INSERT INTO  bebida
                    ( cod_categoria, cantidad, descripcion, nombre_bebida, volumen, marca, descuento, url,puntuacion, grado_acohol) 
                    VALUES ('" .$data['cod_categoria']. "', '".$data['cantidad']."','".$data['descripcion']."','".$data['nombre']."','".$data['cantidad']."','".$data['marca']."','".$data['descuento']."','".$data['url']."','".$data['puntuacion']."'
                    ,'".$data['grado_acohol']."')";

                   $result  =  $this->repository->create($query);
                   $this->response->response(
                    true, 
                    'Datos guardados y creados con exito',
                     200,
                     $result);
        }

    } 

        private function update()
        {
            $postBody = file_get_contents('php://input');
            $data = json_decode($postBody,true);   

            $id = $_GET['id'];


            if(
                !isset($data['cantidad'])     || !isset($data['cod_categoria']) || 
                !isset($data['descripcion'])  || !isset($data['descuento'])     ||
                !isset($data['grado_acohol']) || !isset($data['marca'])         ||
                !isset($data['nombre'])       || !isset($data['puntuacion'])    ||
                !isset($data['url'])  || !isset($data['volumen'])){
                    $this->response->response(
                        false, 
                        'Faltan datos',
                         400,
                         []);
                }else{
                
            $query = " UPDATE bebida SET cod_categoria = '".$data['cod_categoria']."', cantidad = '". $data['cantidad']."', descripcion = '".$data['descripcion']."', nombre_bebida = '".$data['nombre']."', volumen = '".$data['volumen']."', marca = '".$data['marca']."', descuento = '".$data['descuento']."', url = '".$data['url']."', puntuacion = '".$data['puntuacion']."', grado_acohol = '".$data['grado_acohol']."'  WHERE id_bebida = '".$id."'";
            $result  =  $this->repository->update($query);

            $this->response->response(
                true, 
                'Datos Actualizados con exito',
                 200,
                 $result);
            
            }
        } 
        
    }

?>