<?php

include('db_connect.php');
$doneErr = $phone = $address = "";
$task = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //I don't know how to access the e-mail of the current session, so I just put an e-mail that matches a user account
    $email = 'kikomoraisleitao@gmail.com';

    if(empty($_POST['task'])) {
        echo "You didn't select any tasks.";
    } else {
        
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        
        $q2 = "INSERT INTO tasker (email, phone, address) VALUES ('$email', '$phone', '$address')";
        $r2 = pg_query($db, $q2);
        if (!$r2) {
            $doneErr = "you're already registered as a tasker";
        } else {
            echo "You have successfully registered";
        }

        foreach($_POST['task'] as $selected) {
            $q1 = "INSERT INTO performs (task_type, email) VALUES ('$selected', '$email')";
            $r1 = pg_query($db, $q1);
            if (!$r1) {
                $doneErr = "You already registered for the selected tasks";
            }
        }
    }
}

?>