<?php 

namespace App\Models;

class Produto {
    
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }
}