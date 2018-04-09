<?php include('login_check.php') ?>

<!DOCTYPE html>
<html lang="en">

    <?php require_once('header.php') ?>
    <link href="css/heroic-features.css" rel="stylesheet" />

    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">TaskBunny</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>
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
        	<a href="#" class="btn btn-primary btn-lg">Request a Task!</a>
        	<a href="#" class="btn btn-primary btn-lg">Become a Tasker!</a>
    	</header>
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

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php') ?>

    </body>

</html>