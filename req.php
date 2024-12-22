<?php
    require('assets/database/Database.php');

$re = new Database();
    $car = $re->query("select * from voiture where id = :id", ['id' => $_GET["id"]])->fetch(PDO::FETCH_ASSOC);

    echo json_encode($car);