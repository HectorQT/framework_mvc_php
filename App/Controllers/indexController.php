<?php 

namespace App\Controllers;

class IndexController {

    public function index() {
       require_once "../App/Views/index/index.phtml";
    }

    public function sobreNos() {
        require_once "../App/Views/index/sobreNos.phtml";
    }
}


