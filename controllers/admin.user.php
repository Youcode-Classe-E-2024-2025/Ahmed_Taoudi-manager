<?php
// session_start();
// echo "admin controller<br>";
// dd($_SESSION);
if (isset($_SESSION['userrole']) && $_SESSION['userrole'] == 'admin') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // dd($_POST);
        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        if (isset($_POST['change_user_status'])) {
            // dd($_POST);
            $id =  htmlspecialchars($_POST['selected_id']);
            $action =  htmlspecialchars($_POST['_action']);
            $db->query("update user_status set userstatus = :action where utilisateur_id = :id ", ['action' => $action, 'id' => $id]);
           
        }
    }

    header('location: /admin?show=users');
} else {
    require('views/404.php');
}
