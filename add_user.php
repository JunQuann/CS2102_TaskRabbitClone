<?php

include('db_connect.php');
$duplicateErr = $name = $email = $password = $postal_code = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = $_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $postal_code = $_POST["postal_code"];

     $q1 = "INSERT INTO user_account (name, email, password, postal_code) VALUES ('$name', '$email', '$password', '$postal_code')";
     $r1 = pg_query($db, $q1);
     if (!$r1) {
         $duplicateErr = $email . " already exists";
     } else {
         echo "You have successfully registered";
     }
}

?>
