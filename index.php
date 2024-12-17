<?php
require('assets/helper/fonctions.php');
require('assets/database/Database.php');

$uri= parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);

$routes = [
    '/'=>'controllers/index.php',
    '/connecter' => 'controllers/log_sign.php',
    '/admin' => 'controllers/admin.php',
];

if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else{
    require 'views/404.php';
};