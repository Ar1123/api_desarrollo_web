<?php

    class Response{
        
        
        
        
        public function __construc(){}

        public function response($ok = false,$message,$statusCode, $body, )
        {
            echo json_encode(
                array(
                'ok'=>$ok,
                'msg'=>$message,
                'statusCode'=>$statusCode,
                'body'=>$body       
                )
            );
        }

    }

?>