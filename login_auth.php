<?php

include('db_connect.php');
$loginError = $email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q1 = "SELECT * FROM user_account WHERE email = '$email'";
    $r1 = pg_query($db, $q1);

    if (!$r1) {
        $loginError = "This email does not exist";
    } else {
        $data = pg_fetch_assoc($r1);
        $hash = $data['password'];
        if (password_verify($password, $hash)) {

            //Setting session variables for to recognise users.
            $_SESSION['logged_in'] = true;
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            header('Location: home.php');
            die();
        } else {
            $loginError = "Your password is incorrect";
        }
    }
}


?>
