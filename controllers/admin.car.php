<?php
// session_start();
// echo "admin controller<br>";
// dd($_SESSION);
if (isset($_SESSION['userrole']) && $_SESSION['userrole'] == 'admin') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit-edit-car'])) {
            // dd($_POST);
            $disponible = (int) $_POST['disponible']; 
            $marque = htmlspecialchars($_POST['marque'], ENT_QUOTES);
            $matricule = htmlspecialchars($_POST['matricule'], ENT_QUOTES);
            $modele = htmlspecialchars($_POST['modele'], ENT_QUOTES);
            $image_url = htmlspecialchars($_POST['image_url'], ENT_QUOTES);
            $id = (int) $_POST['id']; 
            // dd($disponible);
            
            $db->query("update voiture set marque = :marque, modele = :modele, matricule = :matricule, prix_par_jour = :prix_par_jour, disponible = :disponible, image_url = :image_url where id = :id",
            [
                'marque' => $marque,
                'modele' => $modele,
                'matricule' => $matricule,
                'prix_par_jour' => $_POST['prix_par_jour'],
                'disponible' =>  $disponible,
                'image_url' => $image_url,
                'id' => $id
            ]);
            header('location: /admin?show=cars');
        }
    }

} else {
    require('views/404.php');
}
