

<?php
       
     class Querys {

       
       public function __construct(){}    

        public function querysBebidas($type)
        {
            $query;
            switch ($type){
                case 'GET':
                    $query = 'SELECT * FROM bebida';
                    break; 
                
                case 'GET/id':
                    $query = 'SELECT * FROM bebida WHERE id_bebida = :id';                 
                    break; 

                case 'POST':
                    $query = 'INSERT INTO bebida (cod_categoria, cantidad, descripcion, nombre_bebida, volumen, marca, descuento, url, puntuacion,grado_acohol) 
                    VALUES(:cod_categoria, :cantidad, :descripcion, :nombre_bebida, :volumen, :marca, :descuento, :url, :puntuacion,:grado_acohol)  
                        ';
                    break; 

                case 'PUT':
                    $query = 'UPDATE  bebida SET 
                    cod_categoria = :cod_categoria, cantidad  = :cantidad, 
                    descripcion  = :descripcion, nombre_bebida = :nombre_bebida, 
                    volumen = :volumen, marca = :marca, descuento = :descuento, 
                    url = :url, puntuacion = :puntuacion,grado_acohol = :grado_acohol WHERE id_bebida = :id';
                    break; 
                case 'DELETE':

                    $query = 'DELETE  FROM bebida WHERE id_bebida = :id';
                    break;

                
            }
            return $query;
        }
    }  


?>