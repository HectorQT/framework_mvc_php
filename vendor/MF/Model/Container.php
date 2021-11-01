<?php 
//encapsulamento da lógica recorrente nos métodos do Controlador.

namespace MF\Model;

use App\Connection;

class Container {

    public static function getModel($model){
        $class = "App\\Models\\".ucfirst($model);
        $conn = Connection::getDb();
        return new $class($conn);
    }
}