<?php

namespace App;

class Route {

    public function initRoutes() {
        $routes['home'] = array (
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );
        $routes['sobre_nos'] = array(
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobreNos'
        );
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
