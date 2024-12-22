<?php
// session_start();
// dd($_SESSION);
if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
    // userstatus       enum('pending', 'active','archived' )
    $status = $db->query("select userstatus from user_status where utilisateur_id = :id ", ['id' => $_SESSION['userid']])->fetchColumn();
    //    dd($status);
    if (isset($status) && $status == 'active') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-booking'])) {
            // dd($_POST);
            // CSRF
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("CSRF token validation failed. Possible CSRF attack.");
            }
            createReservation($db, $_POST);
        }
        if (isset($_GET['id'])) {
            $car = $db->query("select * from voiture where id = :id", ['id' => $_GET["id"]])->fetch(PDO::FETCH_ASSOC);
            // dd($car['disponible']); 

                require("views/book.view.php");
         
        }
    } else if (isset($status)) {
        $message = 'your account is ' . $status . ' for this moment ';
        require("views/message.php");
    }
} else {
    $message = 'you should log in first';
    require("views/message.php");
}
function createReservation($db, $post)
{
    $utilisateur_id =(int)$_SESSION['userid'];
    $voiture_id = (int)$post['voiture_id'];     
    $date_debut = date('Y-m-d', strtotime($post['start_date']));  
    $date_fin = date('Y-m-d', strtotime($post['end_date']));      
 
   $db->query("insert into reservations (utilisateur_id, voiture_id, date_debut, date_fin)  values (:utilisateur_id, :voiture_id, :date_debut, :date_fin )",
                  ['utilisateur_id'=>$utilisateur_id,
                  'voiture_id'=>$voiture_id,
                  'date_debut'=>$date_debut,
                  'date_fin'=>$date_fin
                  ]);
}
