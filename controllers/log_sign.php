<?php
// session_start()
// dd(session_start());
// dd(isset($_GET['mtd']));

// dd($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {

        $useremail = htmlspecialchars($_POST['useremail'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        // validate($useremail,);
        $user = $db->query(
            "select * from utilisateur where email = :email and mot_pass = :password",
            ['email' => $useremail, 'password' => $password]
        )->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // dd($user);
            $role = $db->query(
                "select * from roles where utilisateur_id = :id ",
                ['id' => $user['id']]
            )->fetch(PDO::FETCH_ASSOC);
            // dd($role);
            $_SESSION['username'] = $user['name'];
            $_SESSION['userid'] = $user['id'];
            $_SESSION['useremail'] = $user['email'];
            $_SESSION['password'] = $user['mot_pass'];
            if ($role) {
                if ($role['nom_role'] == 'admin') {
                    $_SESSION['userrole'] = $role['nom_role'];
                    header("Location: /admin ");
                }
            } else {
                $_SESSION['userrole'] = 'client';
                header("Location: / ");
            }

            // $user[''];
        } else {
            echo ('useremail or the password are wrong ! try again');
            require("views/login.view.php");
        }
    } else if (isset($_POST['signup'])) {
        // dd($_POST);
        
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['mtd']) && $_GET['mtd'] == 'signup') {
        require("views/signup.view.php");
    } else {
        require("views/login.view.php");
    }
}
