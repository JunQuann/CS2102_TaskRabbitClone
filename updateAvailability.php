<?php
session_start();

$email = $_SESSION['email'];
$dateArr = $_POST['avail_date'];
$timeArr = $_POST['avail_time'];
$success = true;

include('db_connect.php');

foreach ($dateArr as $date) {
    // $q1 = "DELETE FROM taskerAvailableDatetime WHERE email = '$email' AND availableDate ='$date'";
    // pg_query($db, $q1);
    foreach ($timeArr as $time) {
        $q2 = "INSERT INTO taskerAvailableDatetime VALUES ('$email', '$date', '$time')";
        $r2 = pg_query($db, $q2);
        $success = $success && $r2;
    }
}

if ($success) {
    echo 'Successfully update your schedule';
}
 ?>
