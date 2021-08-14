<?php



        include_once 'api/api_bebidas/api_bebidas.php';


        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        
        header('Content-Type: application/json'); 
        
        $ruta_1 = 'http://localhost/Api_desarrollo_web/Categorias';
        $ruta_2 = 'http://localhost/Api_desarrollo_web/bebidas';

            $bebida = new ApiBebidas;

        switch($url_actual){
            case $ruta_1 || $ruta_1.'.php':

                $bebida->getQuety('');
                
                break;
            case $ruta_2 || $ruta_2.'.php':
                echo "333";
                break;
            default:
            echo    json_encode(
                 array(
                    'ok'=>false,
                    'msg'=>'Ruta No encontrada',
                    'statusCode'=>404,
                    'body'=>[] 
                 )
                );
            break;  
        }
?>
