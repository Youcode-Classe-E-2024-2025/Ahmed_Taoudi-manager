<?php
// session_start()
// dd(session_start());
// dd(isset($_GET['mtd']));

// dd($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {

        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }

        $useremail = htmlspecialchars($_POST['useremail'], ENT_QUOTES);
        $password = $_POST['password'];
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

        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        // dd($_POST);
        $useremail = htmlspecialchars($_POST['useremail'], ENT_QUOTES);
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $password = $_POST['password'];
        $emailExists = $db->query("select COUNT(*) from utilisateur where email = :email", ['email' => $useremail])->fetchColumn();
        // dd($emailExists);
        if ($emailExists > 0) {
            echo "you can not use this email try another one <br>";
            require("views/signup.view.php");
        } else {
            $newUser = $db->query(
                "insert into utilisateur (email,name,mot_pass) values (:email, :name , :password)",
                ['name' => $username, 'email' => $useremail, 'password' => $password]
            );
            $id = $db->query("select id from utilisateur where email = :email", ['email' => $useremail])->fetchColumn();
            $db->query("insert into user_status (utilisateur_id) values (:id)",['id'=>$id]);
            require("views/login.view.php");
        }
        // dd($newUser);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['mtd']) && $_GET['mtd'] == 'signup') {
        require("views/signup.view.php");
    } else if(isset($_GET['mtd']) && $_GET['mtd'] == 'logout') {
        session_destroy();
        // dd($_SESSION);
        header('Location: /connecter');
    }else{
        require("views/login.view.php");
    }
}
