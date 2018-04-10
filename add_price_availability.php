<?php
session_start();


include('db_connect.php');
$err = $price = "";


$price = $_POST["price"];
$task_type = $_POST["task_type"];
$email = $_SESSION['email'];
$q3 = "UPDATE performs SET price = '$price' WHERE email = '$email' and task_type = '$task_type'";
$r3 = pg_query($db, $q3);
if (!$r3) {
	echo 'The value you proposed is not acceptable';
} else {
	echo 'Success';
}
?>
