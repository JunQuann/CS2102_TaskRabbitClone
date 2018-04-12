<?php
session_start();

include('db_connect.php');
$doneErr = $user_email = "";

$name = $_SESSION['name'];
$tasker_email = $_POST['tasker_email'];
$user_email = $_POST['user_email'];
$task_type = $_POST['task_type'];
$chosen_date = $_POST['chosen_date'];
$chosen_time = $_POST['chosen_time'];
$status = $_POST['status'];

$q1 = "UPDATE userTaskerTaskPair set status = '$status' WHERE tasker_email = '$tasker_email' and user_email = '$user_email' and task_type = '$task_type' and chosen_date = '$chosen_date' and chosen_time = '$chosen_time'";
$r1 = pg_query($db, $q1);
if (!$r1) {
    echo 'Some error occurred. Please try again';
} else {
    if ($status == 'ACCEPTED') {
        echo 'You have successfully accepted the task!';
    } else {
        echo 'You have declined the task!';
    }
}

?>
