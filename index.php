<?php
session_start();
// $_SESSION['AZE']="ahmed aze";
// $password = 'adminadmin';
// echo password_hash($password, PASSWORD_BCRYPT); die();
// CSRF
if (empty($_SESSION['csrf_token'])) { 

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generates a 64-character hex token
}

require('assets/helper/fonctions.php');
require('assets/database/Database.php');

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_db'])) {
    $db->createDatabase(DBNAME); 
}


$uri= parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);

$routes = [
    '/'=>'controllers/index.php',
    '/connecter' => 'controllers/log_sign.php',
    '/admin' => 'controllers/admin.php',
    '/manage_user' => 'controllers/admin.user.php',
    '/manage_car' => 'controllers/admin.car.php',
    '/manage_reservations' => 'controllers/admin.book.php',
    '/cars' => 'controllers/cars.php',
    '/book' => 'controllers/book.php',
    '/profile' => 'controllers/profile.php',

];

if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else{
    require 'views/404.php';
};