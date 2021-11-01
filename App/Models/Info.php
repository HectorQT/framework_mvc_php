<?php 

namespace App\Models;
use MF\Model\Model;

class Info extends Model {
    
    protected $db;

    public function getInfo(){
    
        $query = "SELECT titulo, descricao from tb_info";
        return $this->db->query($query)->fetchAll();
    }
}