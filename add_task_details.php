<?php
session_start();


include('db_connect.php');
$err = $price = "";


$task_details = $_POST["task_details"];
$task_type = $_POST["task_type"];
$email = $_SESSION['email'];
$q3 = "UPDATE performs SET task_details = '$task_details' WHERE email = '$email' and task_type = '$task_type'";
$r3 = pg_query($db, $q3);
if (!$r3) {
	echo 'Something went wrong. Please try again';
} else {
	echo 'Success';
}
?>
