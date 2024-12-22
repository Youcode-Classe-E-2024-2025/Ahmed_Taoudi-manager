<?php
// session_start();
// echo "admin controller<br>";
// dd($_SESSION);
if (isset($_SESSION['userrole']) && $_SESSION['userrole'] == 'admin') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['change_reservation_status'])) {
            // CSRF
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("CSRF token validation failed. Possible CSRF attack.");
            }
            // dd($_POST);
            $id = $_POST['selected_id'];
            $statut = $_POST['_action'];
            $db->query("UPDATE reservations SET statut = :statut WHERE id = :id",['statut'=>$statut, 'id'=> $id]);
        }
    }

    header('location: /admin?show=reservations');
} else {
    require('views/404.php');
}
