<?php 

namespace App\Controllers;
use MF\Controller\Action;

class IndexController extends Action {

    public function index() {
        $this->view->dados = array('item1', 'item2', 'item3');
        $this->render('index');
    }

    public function sobreNos() {
        $this->view->dados = array('item4', 'item5'); 
        $this->render('sobreNos');
    }

}


