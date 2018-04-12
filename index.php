<!DOCTYPE html>
<html lang="en">
  <?php require_once("header.php") ?>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-dark static-top">
      <div class="container">
        <a class="navbar-brand text-white" href="#">Task Bunny</a>
        <a class="btn btn-primary" href="sign_in.php">Sign In</a>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Join Your Community of Taskers and Requesters</h1>
            <a href="register.php" role="button" class="btn btn-success mx-auto">Sign up here!</a>
          </div>
          </div>
        </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <h3>Full Support on Desktop and Mobile</h3>
              <p class="lead mb-0">Request a Task on your computer. Accept a Tasker on your phone!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
              <h3>Request Multiple Tasks</h3>
              <p class="lead mb-0">Our state of the art database handles multiple open tasks at once!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <h3>Satisfaction Guaranteed</h3>
              <p class="lead mb-0"> Our state of the art algorithm matches you with
              competant and dependable taskers in your area. We promise. That's the Task Bunny guarantee.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/To_Do_List.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Request a Task</h2>
            <p class="lead mb-0">If you need something done, our intuitive interface allows you to quickly and easily request a task. The taskers in your community will be able to bid on your task and
            you will get the best price for your task. </p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Become a Tasker</h2>
            <p class="lead mb-0">As a Tasker, you have the option to see what others are willing to be paid for the same task. This allows you to know exactly what your time is worth!
            No transaction fee ensures that you're getting the most money per task!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/2.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Whichever you choose, Task Bunny is for you</h2>
            <p class="lead mb-0">Task Bunny is the perfect app that matches Taskers and Requesters in a safe, fair, and dependable manner. We charge no transaction fee. This way Taskers get the most money for their time and Requesters get the best price possible!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
              <h5>Margaret E.</h5>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">" When I'm swamped at work, Task Bunny helps me to find people to make sure my dog gets his daily walk!"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
              <h5>Sarah	W.</h5>
              <p class="font-weight-light mb-0">"I can't believe how easy Task Bunny makes it to find someone to help with my groceries!"</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php require_once("footer.php") ?>

  </body>

</html>
