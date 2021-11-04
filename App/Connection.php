<?php 

namespace App;  

class Connection {

    public static function getDb() {
        try {
            $conn = new \PDO("#pdodrive:host=#localhost;dbname=#nomedobanco", "#usuario", '#senha');
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch(\PDOException $e) { 
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}