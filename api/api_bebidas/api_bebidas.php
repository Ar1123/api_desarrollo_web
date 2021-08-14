

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
                    
                    // echo json_encode($result);
                    break;
                case 'POST':
                        echo 'POST';
                    break;
                case 'PUT':
                        echo 'PUT';
                    break;
                case 'DELETE':
                        echo 'DELETE';
                    break;
                        
            }
        }
        
    }

?>
