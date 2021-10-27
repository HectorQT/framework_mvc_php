<?php

namespace App;


class Route {

    private $routes;

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

    public function initRoutes() {
        $routes['home'] = array (
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        );
        $routes['sobre_nos'] = array(
            'route' => '/sobre_nos',
            'controller' => 'IndexController',
            'action' => 'sobreNos'
        );

        $this->setRoutes($routes);
    }

    public function run($url) {
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
    
    public function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    }
}
