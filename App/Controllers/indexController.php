<?php 

namespace App\Controllers;

use MF\Controller\Action;
use App\Connection;
use App\Models\Produto;

class IndexController extends Action {

    public function index() {
        //$this->view->dados = array('item1', 'item2', 'item3');

        //instância de conexão
        $conn = Connection::getDb();
        //instância do model
        $produto = new Produto($conn);
        $this->view->dados = $produto->getProdutos();

        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        //$this->view->dados = array('item4', 'item5'); 
        $this->render('sobreNos', 'layout2');
    }

}


