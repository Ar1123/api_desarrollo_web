

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
                    $result  =    $this->repository->getAll('SELECT * FROM bebida');
                   $this->response->response(
                       true, 
                       'Consula exitosa',
                        200,
                        $result);
                    
                    break;
                case 'POST':

                    $this->createBebida();


                    break;
                case 'PUT':
                        echo 'PUT';
                    break;
                case 'DELETE':
                        echo 'DELETE';
                    break;
                        
            }
        }
        private function createBebida(){
            $postBody = file_get_contents('php://input');
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
        
    }

?>
