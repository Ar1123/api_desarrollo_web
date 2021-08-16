<?php

    include_once 'controller/controller_bebida.php';
    include_once 'helpers/response_helper.php';

    class Bebida{

         private $bebidaCrudImpl;   

        public function __construct(){
         $this->bebidaCrudImpl = new  BebidaCrudImpl();      
         $this->response = new Response();

        }


        public function getActionTypeB()
        {
            switch( $_SERVER['REQUEST_METHOD']){

                case 'GET':
                    $this->getBebida();
                    break;
                case 'POST':
                    $this->createBebida();
                    break;
                case 'PUT':
                        $this->updateBebida();
                    break;
                case 'DELETE':
                    $this->deleteBebida();
                    break;

            }
        }

        private  function getBebida(){
            $result;
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $result =  $this->bebidaCrudImpl->readById($id);
            }else{
                $result =  $this->bebidaCrudImpl->readAll();
            }

            $this->message($result);
        }

        private function message($result){
        
            if($result){
               
              return   $this->response-> status_200('consulta exitosa', [$result]);
         
            }else{
              
               return  $this->response-> status_200('No hay informaccion para este usuario', []);
            }
    }


        private function createBebida(){
            $postBody = file_get_contents('php://input');
            $data = (array) json_decode($postBody,true);
            
            
            if($this->validator($data) ){

                $result  =  $this->bebidaCrudImpl->create($data);

                if($result){
                    return $this->response-> status_201('creados');               
                }
        }

    }  

    private function updateBebida()
    {
        $postBody = file_get_contents('php://input');
        $data = json_decode($postBody,true);
        if(!isset($_GET['id'])){
            return   $this->response-> status_400();             

        }
     
        $id = $_GET['id'];


       if($this->validator($data) ){

                $result  =  $this->bebidaCrudImpl->update($data, $id);
                if($result){
                   return  $this->response-> status_201('actualizados');               

                }
        }
    }

    private function deleteBebida()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = 'DELETE  FROM bebida WHERE id_bebida = :id';
            $result  =  $this->bebidaCrudImpl->delete($id);
            if($result){
            return     $this->response-> status_200('se ha eliminado con exito', []);
            }
        }else{
           return  $this->response-> status_400();          
        }

    }


        private function validator($data){

            if(
                !isset($data['cantidad'])     || !isset($data['cod_categoria']) ||
                !isset($data['descripcion'])  || !isset($data['descuento'])     ||
                !isset($data['grado_acohol']) || !isset($data['marca'])         ||
                !isset($data['nombre_bebida'])       || !isset($data['puntuacion'])    ||
                !isset($data['url']) ){
                  return   $this->response-> status_400();               
            
        }
        return true;
        }
    }

?>