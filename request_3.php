<?php include('login_check.php') ?>

<!DOCTYPE html>
<html>

    <?php include('header.php') ?>

    <body>

        <?php
            $tasker_email = $_SESSION['tasker_email'];
            $tasker_name = $_SESSION['tasker_name'];
            $email = $_SESSION['email'];
            $address = $_SESSION['address'];
            $price = $_SESSION['price'];
            $duration = $_SESSION['duration'];
            $date = $_SESSION['date'];
            $time = $_SESSION['time'];
            $task = $_SESSION['task'];
            $task_details = $_SESSION['task_details'];

            if (isset($_POST['submit'])) {
                include('db_connect.php');
                $q1 = "INSERT INTO userTaskerTaskPair VALUES ('$email', '$tasker_email', '$task', '$date', '$time', '$address', '$task_details', '$duration')";
                $r1 = pg_query($db, $q1);
                if (!$r1) {
                    echo pg_last_error();
                } else {
                    header('Location: home.php');
                }
            }
        ?>

        <body class="bg-light">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <span class="navbar-brand px-auto mb-0 h1">TaskRabbit</span>
            </nav>

            <div class="container-fluid text-center bg-white">
                <hr class="mt-0">
                <div class="row justify-content-md-center">
                    <div class="col col-10">
                        <div class="row">
                            <div class="col">
                                <p>1. Fill Out Task Details</p>
                            </div>
                            <div class="col">
                                <p>2. View Tasker and Price</p>
                            </div>
                            <div class="col">
                                <p><b>3. Confirm booking</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container bg-light">
                <div class="text-center py-5">
                    <h3>Comfirmation Page</h3>
                    <p>Just one step before getting your tasker assigned!</p>
                </div>
            </div>

            <div class="card mx-auto mb-5" style="width: 55%;">
                <div class="card-body">
                    <div class='d-flex justify-content-between mb-2'>
                        <h3 class='card-title'><?php echo $task ?></h3>
                        <h3>$<?php echo $price ?></h3>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">Tasker Name: </dt>
                        <dd class="col-sm-9"><?php echo $tasker_name ?></dd>

                        <dt class="col-sm-3">Date &amp; Time:</dt>
                        <dd class="col-sm-9"><?php echo $date.", ".$time ?></dd>

                        <dt class="col-sm-3">Duration</dt>
                        <dd class="col-sm-9">
                            <?php
                            if ($duration == 1) {
                                echo "Small - Est. 1 hr";
                            } if ($duration == 2) {
                                echo "Medium - Est. 2 hrs";
                            } if ($duration == 3) {
                                echo "Large - Est. 3 hrs";
                            }
                            ?>
                        </dd>

                        <dt class="col-sm-3">Address: </dt>
                        <dd class="col-sm-9"><?php echo $address ?></dd>

                        <dt class="col-sm-3">Task Details:</dt>
                        <dd class="col-sm-8"><?php echo $task_details ?></dd>
                    </dl>

                    <form method='POST' action='request_3.php'>
                        <button type="submit" name="submit" class="btn btn-success btn-block mx-auto" style="width: 50%" value="1">
                            Confirm
                        </button>
                    </form>
                </div>
            </div>

            <?php require_once('footer.php') ?>
    </body>
</html>
