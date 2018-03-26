<?php

include('db_connect.php');
$loginError = $email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q1 = "SELECT * FROM user_account WHERE email = '$email'";
    $r1 = pg_query($db, $q1);

    if (!$r1) {
        $loginError = "This email does not exists";
    } else {
        $hash = pg_fetch_assoc($r1)['password'];
        if (password_verify($password, $hash)) {
            $loginError = "You have successfully logged in";
        } else {
            $loginError = "Your password is incorrect";
        }
    }
}


?>