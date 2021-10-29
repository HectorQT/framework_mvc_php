<?php 

/*
Camada de abstração do Controller, onde separamos toda a camáda lógica (estrutural)
para que ao criarmos outros Controllers, estes herdem os atribútos e métodos da classe
Action e restrinja em seu escopo só a parte funcional.
*/

namespace MF\Controller;

abstract class Action {
    
    protected $view;

    public function __construct() {
        $this->view = new \stdClass(); /*A StdClass é uma classe predefinida do PHP. Ela é vazia, ou seja, 
        não possui métodos nem propriedades. É útil também utilizar a StdClass quando
        se deseja criar um objeto vazio e ir adicionando as propriedades conforme necessário.*/
    }

    
    protected function render($view, $layout) {
        $this->view->page = $view;
        if(file_exists("../App/Views/".$layout.".phtml")){
            require_once "../App/Views/".$layout.".phtml";
        } else {
            $this->content();
        }
        
    }

    protected function content(){
        
        $class = get_class($this);
        $class = str_replace('App\\Controllers\\', '', $class);
        $class = strtolower(str_replace('Controller', '', $class));

        require_once "../App/Views/".$class."/".$this->view->page.".phtml";
    }

}



