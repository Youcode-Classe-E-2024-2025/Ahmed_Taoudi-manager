<?php 

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_db'])) {
    $db->createDatabase(DBNAME); 
}

// dd($db);

require("views/index.view.php");
