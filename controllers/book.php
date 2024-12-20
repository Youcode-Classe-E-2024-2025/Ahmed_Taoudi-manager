<?php 
// session_start();
// dd($_SESSION);
if(isset($_SESSION['userid'])&&isset($_SESSION['username'])){
    // userstatus       enum('pending', 'active','archived' )
   $status = $db->query("select userstatus from user_status where utilisateur_id = :id ",['id'=>$_SESSION['userid']])->fetchColumn();
//    dd($status);
if(isset($status)&& $status=='active'){

    require("views/book.view.php");
}else if(isset($status)&& $status=='pending'){
    $message = 'your account is pending for this moment ';
    require("views/message.php");
}else  if(isset($status)&& $status=='archived'){
    $message = 'your account is archived for this moment ';
    require("views/message.php");
}

}else{ 
    $message = 'you should log in first';
    require("views/message.php");

}

