<?php
// session_start();
// dd($_SESSION);
if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
    // userstatus       enum('pending', 'active','archived' )
    $status = $db->query("select userstatus from user_status where utilisateur_id = :id ", ['id' => $_SESSION['userid']])->fetchColumn();
    //    dd($status);
    if (isset($status) && $status == 'active') {

        $user = $db->query("SELECT id, name, email, date_inscription FROM utilisateur WHERE id = :id", ['id' => $_SESSION['userid']])->fetch(PDO::FETCH_ASSOC);

       
          $userReservations = $db->query("SELECT r.id AS reservation_id, v.marque AS car_brand, v.modele AS car_model, v.image_url AS car_image, 
          r.date_debut AS start_date, r.date_fin AS end_date, v.prix_par_jour AS price_per_day, r.statut AS status
       FROM reservations r
       JOIN voiture v ON r.voiture_id = v.id
       WHERE r.utilisateur_id = :id", ['id' => $_SESSION['userid']])->fetchAll(PDO::FETCH_ASSOC);


        require("views/profile.view.php");
        
    } else if (isset($status)) {
        $message = 'your account is ' . $status . ' for this moment ';
        require("views/message.php");
    }
} else {
    $message = 'you should log in first';
    require("views/message.php");
}
