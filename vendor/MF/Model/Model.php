<?php 
//abstração do método construct presente em todos Models
namespace MF\Model;

abstract class Model {
    public function __construct(\PDO $db){
        $this->db = $db;
    }
}