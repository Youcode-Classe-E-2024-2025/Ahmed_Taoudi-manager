<?php
// session_start();
// echo "admin controller<br>";
// dd($_SESSION);
if (isset($_SESSION['userrole']) && $_SESSION['userrole'] == 'admin') {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $list;

        if (isset($_GET['show']) && $_GET['show'] == 'cars') {
            $partial = 'cars';
            $list = $db->query("select * from voiture")->fetchAll(PDO::FETCH_ASSOC);
            // dd($list);
        } else if (isset($_GET['show']) && $_GET['show'] == 'reservations') {
            $partial = 'reservations';

            $list = $db->query(" select  r.id, u.name as user_name, v.image_url as car_image,v.marque as car_marque , v.modele as car_modele,  r.date_debut, r.date_fin,  r.statut    from reservations r left join utilisateur u ON r.utilisateur_id = u.id JOIN voiture v ON r.voiture_id = v.id ");

            // dd($list);
            // $list = $db->query("select * from reservations")->fetchAll(PDO::FETCH_ASSOC);
        } else if (isset($_GET['show']) && $_GET['show'] == 'users') {
            $partial = 'users';
            $archived_account = $db->query("select COUNT(*) from user_status where userstatus = 'archived' ")->fetchColumn() ;
            $active_account = $db->query("select COUNT(*) from user_status where userstatus = 'active' ")->fetchColumn() ;
            $pending_account = $db->query("select COUNT(*) from user_status where userstatus = 'pending' ")->fetchColumn() ;

            $list = $db->query("select u.* , s.userstatus from utilisateur u left join user_status s on u.id = s.utilisateur_id ")->fetchAll(PDO::FETCH_ASSOC);
            // dd($list);
        } else {
            $partial = 'dashboard';
           $nbrUsers = $db->query("select COUNT(*) from utilisateur ")->fetchColumn();
           $nbrOrders = $db->query("select sum(p.montant) from reservations r inner join paiements p on r.id = p.reservation_id ")->fetchColumn();
           $nbrCars = $db->query("select COUNT(*) from voiture where disponible = 1 ")->fetchColumn();
            $list = $db->query("select u.* , s.userstatus from utilisateur u left join user_status s on u.id = s.utilisateur_id where s.userstatus = 'pending' ")->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    //    $user=['name'=>"ahmed",'email'=>"ahmed@aazaz.sasa",'userstatus'=>"active",'date_inscription'=>"2024-12-29"];
    require("views/admin/index.view.php");
} else {
    require('views/404.php');
}
