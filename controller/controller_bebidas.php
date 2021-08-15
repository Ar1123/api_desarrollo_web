

<?php

    include_once 'repository/local_repository.php';
    include_once 'helpers/response_helper.php';
    include_once 'utils/querys.php';


    class ControllerBebidas{
        private $repository;
        private $response;
        private $querys;
        public function __construct(){
            $this->repository = new LocalRepository();
            $this->response = new Response();
            $this->querys = new Querys();
        }

        public function getMethod(){

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
                $this->delete();
                    break;

            }
        }

        private  function getBebida(){
           
            $result;
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = $this->querys->querysBebidas('GET/id');
                $result  =    $this->repository->getDataById($query, $id);
                
            }else{
               
            $query   = $this->querys->querysBebidas('GET');
            $result  =    $this->repository->getAllData($query);
            }
            $this->message($result);
        }

        public function message($result){
                if($result){
                   
                    $this->response-> status_200('consulta exitosa', $result);
             
                }else{
                  
                    $this->response-> status_200('No hay informaccion para este usuario', $result);
                }
        }

        
        private function createBebida(){
            $postBody = file_get_contents('php://input');
            $data = (array) json_decode($postBody,true);
               
            
            if($this->validator($data) ){

                $query = $this->querys->querysBebidas('POST');
                $result  =  $this->repository->create($data, $query);

                 if($result){
                    $this->response-> status_201();               
                }

        }

    }

        private function update()
        {
            $postBody = file_get_contents('php://input');
            $data = json_decode($postBody,true);
            $id = $_GET['id'];


           if($this->validator($data) ){

                    $query = $this->querys->querysBebidas('PUT');
                    $result  =  $this->repository->update($data, $id,$query);


            }
        }

        private function delete()
        {
            $id = $_GET['id'];
            $query = $this->querys->querysBebidas('DELETE');
            $result  =  $this->repository->delete($query, $id);


        }

        private function validator($data){

            if(
                !isset($data['cantidad'])     || !isset($data['cod_categoria']) ||
                !isset($data['descripcion'])  || !isset($data['descuento'])     ||
                !isset($data['grado_acohol']) || !isset($data['marca'])         ||
                !isset($data['nombre_bebida'])       || !isset($data['puntuacion'])    ||
                !isset($data['url']) ){
                    $this->response-> status_400();               
             
        }
        return true;
    }

    }

?>