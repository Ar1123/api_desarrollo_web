<?php

    class Response{
                 
        
        public function __construc(){}




        public function status_200($msg, $result)
        {
                echo json_encode(
                    array(
                        'ok'=>true,
                        'statusCode'=>200,
                        'msg'=>$msg,
                         'body' =>$result
                    )
                );
        }
        public function status_201()
        {
            echo json_encode(
                array(
                    'ok'            =>  true,
                    'statusCode'    =>  201,
                    'msg'           =>  'Datos creados con exito'
                )
            ) ;    
        }

        public function status_400()
        {
            echo json_encode(
                array(
                    'ok'            =>  false,
                    'statusCode'    =>  400,
                    'msg'           =>  'Campos faltantes'
                )
            ) ;            
        }
    }

?>