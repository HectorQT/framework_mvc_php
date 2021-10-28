<?php 

namespace App\Controllers;

class IndexController {

    private $view;

    public function __construct() {
        $this->view = new \stdClass(); /*A StdClass é uma classe predefinida do PHP. Ela é vazia, ou seja, 
        não possui métodos nem propriedades. É útil também utilizar a StdClass quando
        se deseja criar um objeto vazio e ir adicionando as propriedades conforme necessário.*/
    }

    public function index() {
        $this->view->dados = array('item1', 'item2', 'item3');
        $this->render('index');
    }

    public function sobreNos() {
        $this->view->dados = array('item4', 'item5'); 
        $this->render('sobreNos');
    }

    public function render($view) {
        
        $class = get_class($this);
        $class = str_replace('App\\Controllers\\', '', $class);
        $class = strtolower(str_replace('Controller', '', $class));

        require_once "../App/Views/".$class."/".$view.".phtml";

    }
}


