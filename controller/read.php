<?php
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');

        include_once '../config/connection_database.php';
        include_once '../class/category.class.php';

        $database = new DataBaseConnection();
        $db = $database ->getConnection();
        $category =  new Category($db);

        $stm = $category->getAllCategory();
        $itemCount = $stm->rowCount();

        if($itemCount>0){
            $categoryArr              = array();
            $categoryArr['body']      = array();
            $categoryArr['itemCount'] = $itemCount;

            while($row = $stm->fetch(PDO::FETCH_ASSOC)){

                extract($row);
                $e = array(
                    "id_categoria"=>  $cod_category,
                    "nombre_categoria"=> $category_name,
                );

                array_push($categoryArr['body'], $e);
               echo json_encode($categoryArr);     
            }
        }else{
            http_response_code(404);
            echo json_encode('d');
        }


?>