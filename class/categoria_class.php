<?php

    include_once 'controller/controller_categoria.php';
    include_once 'helpers/response_helper.php';

    class Categoria{

         private $categoriaCrudImpl;   

        public function __construct(){
         $this-> categoriaCrudImpl = new  CategoriaCrudImpl();      
         $this->response = new Response();

        }


        public function getActionTypeC()
        {
            switch( $_SERVER['REQUEST_METHOD']){

                case 'GET':
                    $this->getCategoria();
                    break;
                case 'POST':
                    $this->createCategoria();
                    break;
                case 'PUT':
                        $this->updateCategoria();
                    break;
                case 'DELETE':
                    $this->deleteCategoria();
                    break;

            }
        }

        private  function getCategoria(){
            $result;
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $result =  $this->categoriaCrudImpl->readById($id);
            }else{
                $result =  $this->categoriaCrudImpl->readAll();
            }

            $this->message($result);
        }

        private function message($result){
        
            if($result){
               
           return      $this->response-> status_200('consulta exitosa', [$result]);
         
            }else{
              
              return   $this->response-> status_200('No hay informaccion para este usuario', []);
            }
    }


        private function createCategoria(){
            $postBody = file_get_contents('php://input');
            $data = (array) json_decode($postBody,true);
            
            
            if($this->validator($data) ){

                $result  =  $this->categoriaCrudImpl->create($data);

                if($result){
                 return    $this->response-> status_201('creados');               
                }
        }

    }  

    private function updateCategoria()
    {
        $postBody = file_get_contents('php://input');
        $data = json_decode($postBody,true);
        if(!isset($_GET['id'])){
            return   $this->response-> status_400();             

        }
        $id = $_GET['id'];


       if($this->validator($data) ){

                $result  =  $this->categoriaCrudImpl->update($data, $id);
                if($result){
                  return   $this->response-> status_201('actualizados');               

                }
        }
    }

    private function deleteCategoria()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = 'DELETE  FROM bebida WHERE id_bebida = :id';
            $result  =  $this->categoriaCrudImpl->delete($id);
            if($result){
              return   $this->response-> status_200('se ha eliminado con exito', []);
            }
        }else{
          return  $this->response-> status_400();          
        }

    }


        private function validator($data){

            if(
                !isset($data['nombre_categoria'])  ){
                  return   $this->response-> status_400();               
            
        }
        return true;
        }
    }

?>