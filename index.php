<?php



        // include_once 'controller/controller_bebidas.php';
        include_once 'class/bebida_class.php';
        include_once 'class/categoria_class.php';


        
        header('Content-Type: application/json'); 
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);
        
        $raiz = 'http://localhost/Api_desarrollo_web/';

        $bebida = new Bebida();
        $categoria = new Categoria();
      
   

            if( $uri[2]=='categorias'||  $uri[2] =='categorias.php'){
                $categoria->getActionTypeC();
            }
            else if($uri[2]=='bebidas'||  $uri[2] =='bebidas.php'){
                $bebida->getActionTypeB();
            }else{
                echo json_encode(
                    array(
                       'ok'=>false,
                       'msg'=>'Ruta No encontrada',
                       'statusCode'=>404,
                       'body'=>[
                        'Andrés Ruiz',
                        'Carlos Castro'
                       ]
                    )
                   );
            }
        
        

?>
