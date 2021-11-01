<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

use App\Models\Produto;
use App\Models\Info;

class IndexController extends Action {

    public function index() {
        //instância de conexão
            //$conn = Connection::getDb();
        //instância do model
            //$produto = new Produto($conn);
        $produto = Container::getModel('Produto');
        $this->view->dados = $produto->getProdutos();
        //renderenizando view
        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        $info = Container::getModel('Info');
        $this->view->dados = $info->getInfo();
         //renderenizando view
        $this->render('sobreNos', 'layout2');
    }

}


