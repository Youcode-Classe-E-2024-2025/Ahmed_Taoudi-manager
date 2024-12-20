<?php 
// session_start();
// dd($_SESSION);
$cars =  $db->query("select * from voiture where disponible = 1 ")->fetchAll(PDO::FETCH_ASSOC);
require("views/cars.view.php");
