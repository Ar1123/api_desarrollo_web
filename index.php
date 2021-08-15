<?php



        include_once 'controller/controller_bebidas.php';


        
        header('Content-Type: application/json'); 
        
        $raiz = 'http://localhost/Api_desarrollo_web/';

        $bebida = new ControllerBebidas;
        $ruta = $_GET['url'] ?? null;
        if($ruta!=null){
            $ruta  =$_GET['url'] ;
        }else{
            $ruta = $raiz;
        }
        
        
        
        switch($ruta){
            case 'categorias':
                echo 'sss';
                break;
            case 'bebidas':
                $bebida->getQuety('');
                break;
            case $raiz:
                echo json_encode(
                    array(
                       'ok'=>true,
                       'msg'=>'Ruta Raiz',
                       'statusCode'=>200,
                       'body'=>[
                           'Andrés Ruiz',
                           'Carlos Castro'
                       ] 
                    )
                   );
                break;
            default:
            echo json_encode(
                 array(
                    'ok'=>false,
                    'msg'=>'Ruta No encontrada',
                    'statusCode'=>404,
                 )
                );
            break;  
        }
?>
