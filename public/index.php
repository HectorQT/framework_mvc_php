<?php 

require_once "../vendor/autoload.php";

$route = new \App\Route;
echo "Ta funfando";
echo '<pre>';
print_r($route->getUrl());
echo '</pre>';