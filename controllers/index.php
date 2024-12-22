<?php 
// session_start();
// dd($_SESSION);


// dd($db);
$cars =  $db->query("select * from voiture where disponible = 1 limit 3 ")->fetchAll(PDO::FETCH_ASSOC);
require("views/index.view.php");
