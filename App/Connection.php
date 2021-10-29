<?php 

namespace App;

use PDOException;

class Connection {

    public function getDb() {
        try {
            $conn = new PDO(
                "pgsql:host=localhost;dbname=motoca;charset=utf8",
                "postgres",
                "M0t0c4PG"
            );

            return $conn;

        } catch (PDOException $e) {
            //tratar errp de alguma forma;
        }
    }
}