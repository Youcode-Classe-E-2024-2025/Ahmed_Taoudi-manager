<?php 
// session_start();
echo "admin controller<br>";
// dd($_SESSION);
if($_SESSION['userrole']=='admin'){
    require("views/admin/index.view.php");
}else{
    require('views/404.php');
}
