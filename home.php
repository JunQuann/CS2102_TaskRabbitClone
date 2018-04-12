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
        	<h1 class="display-3">Welcome to your Taskboard, <?php echo $_SESSION['name'] ?>!</h1>
        	<p class="lead">You can easily manage your current and future tasks.</p>
        	<a href="request_1.php" class="btn btn-primary btn-lg">Request a Task!</a>
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
	</div>
        <!-- Page Features -->
    	<section class="page-header">
    		<div class="container">
    			<h2 class="mb-5">Learn about our tasks</h2>
    			<div class="row">
          			<div class="col-lg-4">
            			<div class="container-fluid">
              				<img class="img-fluid" src="img/mounting.png" alt="">
              				<h5>Wall Mounting</h5>
              				<p class="font-weight-light mb-0">Mount a tv, mirror, or picture frame</p>
            			</div>
         		 	</div>
          			<div class="col-lg-4">
            			<div class="container-fluid">
              				<img class="img-fluid" src="img/truck3.png" alt="">
              				<h5>Moving and Packing</h5>
              				<p class="font-weight-light mb-0">Just tell us how big your item(s) are and get them moved with ease</p>
            			</div>
          			</div>
          			<div class="col-lg-4">
           				<div class="container-fluid">
             				<img class="img-fluid" src="img/cleaning.jpeg" alt="">
              				<h5>Cleaning</h5>
              				<p class="font-weight-light mb-0">Deep clean your home, office, or car</p>
            			</div>
          			</div>
        		</div>
       			<div class="row">
          			<div class="col-lg-4">
            			<div class="container-fluid">
              				<img class="img-fluid" src="img/dog.png" alt="">
              				<h5>Pet Care</h5>
              				<p class="font-weight-light mb-0">From pet-sitting to pet-walking we've got you covered</p>
           				</div>
          			</div>
          			<div class="col-lg-4">
            			<div class="container-fluid">
             				<img class="img-fluid" src="img/assembly2.png" alt="">
              				<h5>Assembling Furniture</h5>
              				<p class="font-weight-light mb-0">Let our professional taskers put your furniture together</p>
            			</div>
          			</div>
          			<div class="col-lg-4">
            			<div class="container-fluid">
              				<img class="img-fluid" src="img/tools2.png" alt="">
              				<h5>General Handyman</h5>
              				<p class="font-weight-light mb-0">We'll match you up with a tasker that has the tools needed for your home maintenance</p>
            			</div>
          			</div>
        		</div>
      		</div>
    	</section>

        
        
        
        <!-- /.row -->


    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php') ?>

    </body>

</html>
