

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
                $this->delete();
                    break;

            }
        }

        private  function getBebida(){
           
           
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $query = $this->querys->querysBebidas('GET/id');

                $result  =    $this->repository->getDataById($query, $id);
                $this->response->response(
                    true,
                    'Consula exitosa',
                     200,
                     $result);


            }else{
                $query = $this->querys->querysBebidas('GET');

                $result  =    $this->repository->getAllData($query);
                $this->response->response(
                           true,
                           'Consula exitosa',
                            200,
                            $result);
            }
        }

        private function createBebida(){
            $postBody = file_get_contents('php://input');
            $data = (array) json_decode($postBody,true);
                if(
                !isset($data['cantidad'])     || !isset($data['cod_categoria']) ||
                !isset($data['descripcion'])  || !isset($data['descuento'])     ||
                !isset($data['grado_acohol']) || !isset($data['marca'])         ||
                !isset($data['nombre_bebida'])       || !isset($data['puntuacion'])    ||
                !isset($data['url']) ){
                    $this->response->response(
                        false,
                        'Faltan datos',
                         400,
                         []);
                }else{

                    $query = $this->querys->querysBebidas('POST');

                   $result  =  $this->repository->create($data, $query);

                    if($result){

                        echo json_encode(
                            array(
                                'ok'            =>  true,
                                'statusCode'    =>  201,
                                'msg'           =>  'Datos creados con exito'
                            )
                        );

                        }

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
                !isset($data['nombre_bebida'])       || !isset($data['puntuacion'])    ||
                !isset($data['url'])  || !isset($data['volumen'])){
                    $this->response->response(
                        false,
                        'Faltan datos',
                         400,
                         []);
                }else{

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

    }

?>