<?php 

/*
Camada de abstração do Route, onde seperamos toda a camáda lógica
que manipula os atributos. Assim, condesamos em Route só as informações
importantes da página acessada (Rota, Controlador e Ação);
*/

namespace MF\Init;

//Classe abstract tem como particularidade o fato de que ela não pode ser instanciada, somente herdada.
abstract class Bootstrap {

    private $routes;
    //atributos/métodos abstract são atr/met que devem ser declarados na classe filha.
    abstract protected function initRoutes();

    public function __construct() {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }
   
    
    protected function run($url) {
        foreach ($this->getRoutes() as $page => $config_page) {
            if ($url == $config_page['route']) {
                $class = "App\\Controllers\\"  . $config_page['controller'];
                $controller = new $class;
                $action = $config_page['action'];
                $controller->$action();

            }
        }
    }

    /**
     * 
     * método que retorna a URL acessada pelo cliente;
     * @return array $_SERVER super global que traz todas os detalhes do servidor; 
     * paser_url() serve para tratar aquela url e retornar o que é [path] e o que é [query]. 
     * Ela poder possuir parâmetros como PHP_URL_PATH que só retorna o path;
     * 
     */

    protected function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    }
}

