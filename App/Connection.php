<?php 

namespace App;  

class Connection {

    public static function getDb() {
        try {
            $conn = new \PDO("pgsql:host=localhost;dbname=motoca", "postgres", 'M0t0c4PG');
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch(\PDOException $e) { 
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}