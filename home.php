<?php include('login_check.php') ?>

<!DOCTYPE html>
<html lang="en">

    <?php require_once('header.php') ?>
    <link href="css/heroic-features.css" rel="stylesheet">

    <body>

    <?php
    include('db_connect.php');
    $email = $_SESSION['email'];
    $q1 = "SELECT * FROM taskers WHERE email = '$email'";
    $is_tasker = false;
    $r1 = pg_query($db, $q1);
    if (pg_num_rows($r1) > 0) {
        $is_tasker = true;
    }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">TaskRabbit</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                <?php if ($is_tasker) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="tasker_dashboard.php">Tasker's Page</a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">A Warm Welcome, <?php echo $_SESSION['name'] ?>!</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <a href="request_1.php" class="btn btn-primary btn-lg">Request Task!</a>
        <?php if (!$is_tasker) { ?>
            <a href="register_tasker.php" class="btn btn-primary btn-lg">Become a Tasker!</a>
        <?php } ?>
        </header>

        <div class="row mb-4">
            <div class="col-lg-12 mx-auto">
                <h3>List of Requested Tasks</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Duration</th>
                                            <th>Tasker</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include('db_connect.php');
                                        $email = $_SESSION['email'];
                                        $q1 = "SELECT * FROM userTaskerTaskPair WHERE user_email = '$email'";
                                        $r1 = pg_query($db, $q1);
                                        $count = 1;

                                        if (pg_num_rows($r1) > 0) {
                                            while($row = pg_fetch_assoc($r1)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                            <?php echo $count; ?>
                                            </th>
                                            <td><?php echo $row['task_type'] ?></td>
                                            <td><?php echo $row['chosen_date'] ?></td>
                                            <td><?php echo $row['chosen_time'] ?></td>
                                            <td><?php
                                            if ($row['duration']  == 1) {
                                                echo "Small - Est. 1 hr";
                                            } if ($row['duration'] == 2) {
                                                echo "Medium - Est. 2 hrs";
                                            } if ($row['duration'] == 3) {
                                                echo "Large - Est. 3 hrs";
                                            }
                                            ?></td>
                                            <td><?php echo $row['tasker'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                                $count++;
                                            }
                                        } else {
                                            echo "No requests currently";
                                        }
                                        pg_close();
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php') ?>

    </body>

</html>
