<?php include('login_check.php') ?>

<!DOCTYPE html>
<html>

    <?php include('header.php') ?>

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
                            <p><b>2. View Tasker and Price</b></p>
                        </div>
                        <div class="col">
                            <p>3. Confirm booking</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-light">
            <div class="text-center py-5">
                <h3>Pick a Tasker</h3>
                <p>After booking, you can chat with your Tasker, agree on an exact time, or go over any requirements or questions, if necessary.</p>
            </div>
        </div>

        <?php

        ?>

        <div class="container bg-light mb-5">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            TASK DATE &amp; TIME:
                        </div>

                        <?php
                            if (isset($_POST['confirm'])) {
                                $_SESSION['time'] = $_POST['time'];
                                $_SESSION['tasker_email'] = $_POST['tasker_email'];
                                $_SESSION['price'] = $_POST['price'];
                                $_SESSION['tasker_name'] = $_POST['name'];
                                header('Location: request_3.php');
                            }
                         ?>

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="form-group mx-auto" style="width: 80%">
                                    <input type="text" class="form-control" name="availableDate" value=""/>

                                    <script type="text/javascript">
                                    $(function() {

                                        var end = moment().add(14, 'days');

                                        $('input[name="availableDate"]').daterangepicker({
                                            singleDatePicker: true,
                                            showDropdowns: true,
                                            minDate: moment(),
                                            maxDate: end
                                        });
                                    });
                                    </script>
                                </div>
                                <div class="form-group no-margin mx-auto" style="width: 70%">
                                    <button type="submit" name="tasker_availability" class="btn btn-success btn-block">
                                        Check Available Taskers
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
                <div class="col-8">
                    <?php
                        if (isset($_POST['tasker_availability'])) {
                            include('db_connect.php');
                            $date = $_SESSION['date'] = $_POST['availableDate'];
                            $task = $_SESSION['task'];
                            $email = $_SESSION['email'];
                            $q1 = "SELECT distinct name, price, email, task_description FROM performs natural join taskeravailabledatetime natural join taskers WHERE task_type = '$task'
                            and availableDate = '$date' and email <> '$email'";
                            $r1 = pg_query($db, $q1);
                            $count = 0;

                            while($row = pg_fetch_assoc($r1)) {
                                $count++;
                                $name = $row['name'];
                                $price = $row['price'];
                                $email = $row['email'];

                                echo "<div class='card mb-2'>
                                        <div class='card-body'>
                                            <div class='d-flex justify-content-between'>
                                                <h3 class='card-title'>$name</h3>
                                                <h3>$$price</h3>
                                            </div>
                                                <hr class='mt-0 mb-4'>
                                                <h6 class='card-text'>How I can help:</h6>
                                                <p class='card-text' style='font-size: 14px'>$task_description</p>
                                                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#$email'>
                                                Check Available Timings
                                                </button>

                                                <div class='modal fade' id='$email' tabindex='-1' role='dialog' aria-labelledby='$email.Label' aria-hidden='true'>
                                                <div class='modal-dialog' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>$name's Schedule on $date</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class='modal-body'>

                                                                <form method='POST' action='request_2.php'>

                                                                <div class='form-group' style='display:none'>
                                                                    <input type='text' class='form-control' name='tasker_email' value='$email'/>
                                                                </div>

                                                                <div class='form-group' style='display:none'>
                                                                    <input type='text' class='form-control' name='price' value='$price'/>
                                                                </div>

                                                                <div class='form-group' style='display:none'>
                                                                    <input type='text' class='form-control' name='name' value='$name'/>
                                                                </div>

                                                                <div class='form-group' style='width: 70%'>
                                                                    <label for='time'>Choose a start time from the Tasker’s availability that works for you.</label>
                                                                    <select class='form-control' name='time' id='time'>";
                                                                    $q2 = "SELECT availableTime FROM taskerAvailableDatetime WHERE email = '$email' AND availableDate = '$date' ORDER BY availableTime";
                                                                    $r2 = pg_query($db, $q2);
                                                                    while ($row2 = pg_fetch_row($r2)) {
                                                                        $time = $row2[0];
                                                                        echo "<option>$time</option>";
                                                                    }
                                                                    echo "</select>
                                                                    </div>
                                                                    <button type='submit' name='confirm' class='btn btn-success mb-2'>Select and Continue</button>
                                                                </form>
                                                            <div class='modal-footer'>
                                                            <button type='button' class='btn btn-primary' data-dismiss='modal'>
                                                                Close
                                                             </button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";}
                                if ($count == 0) {
                                    echo "<div> There are no available Taskers on this date </div>";
                                }
                            }
                        ?>
                </div>
            </div>
        </div>


        <?php include('footer.php') ?>

</html>
