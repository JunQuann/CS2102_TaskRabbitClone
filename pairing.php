<?php
session_start();

include('db_connect.php');
$doneErr = $user_email = "";

// $time_occupied = new DateTime('17:00:00');
//
// for ($i = 0; $i < 5; $i++) {
//     if ($i > 0) {
//         $time_occupied->add(new DateInterval('PT1H'));
//     }
//     echo $time_occupied->format('H:i:s');
// }

if ($_POST['status']) {
    $name = $_SESSION['name'];
    $tasker_email = $_POST['tasker_email'];
    $duration = $_POST['duration'];
    $user_email = $_POST['user_email'];
    $task_type = $_POST['task_type'];
    $chosen_date = $_POST['chosen_date'];
    $chosen_time = $_POST['chosen_time'];
    $status = $_POST['status'];

    echo $chosen_time;
    $time_occupied = new DateTime($chosen_time);

    for ($i = 0; $i < $duration; $i++) {
        if ($i > 0) {
            $time_occupied->add(new DateInterval('PT1H'));
        }
        $time_input = $time_occupied->format('H:i:s');
        $q2 = "DELETE FROM taskerAvailableDatetime WHERE email = '$tasker_email' AND availableTime = '$time_input'";
        $r2 = pg_query($db, $q2);
    }
}


$q1 = "UPDATE userTaskerTaskPair set status = '$status' WHERE tasker_email = '$tasker_email'
       and user_email = '$user_email' and task_type = '$task_type' and chosen_date = '$chosen_date' and chosen_time = '$chosen_time'";
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
