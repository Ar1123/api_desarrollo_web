<?php

include_once 'config/connection_database.php';




abstract class Crud {
    abstract public function create($body);
    abstract public function readAll();
    abstract public function readById($id);
    abstract public function update($body, $id);
    abstract public function delete($id);
}



?>