<?php include('login_check.php') ?>


<!DOCTYPE html>
<html>
    <?php require_once('header.php') ?>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <body class="bg-light">

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="#">TaskBunny</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="home.php">Home</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

      <div class="row">
        <div class="col-lg-6">
            <div class="">
                <label for="">Choose your available timing for the whole range of date selected</label>
                <br>
                <button class="btn btn-primary" type="button" name="button" id="datechooser" style="cursor: pointer">Choose your available date and time</button>
            </div>


            <script type="text/javascript">
            $(function() {

                function cb(start, end) {
                    var allDates = [];
                    var allTime = [];
                    var numDays = end.diff(start, 'days');
                    var numHours = end.diff(start, 'hours') - numDays * 24;

                    allDates.push(start.format('MM/DD/YYYY'));
                    allTime.push(start.format('HH:mm'));

                    for (i = 0; i < numDays; i++) {
                        allDates.push(start.add(1, 'days').format('MM/DD/YYYY'));
                    }
                    for (j = 0; j < numHours - 1; j++) {
                        allTime.push(start.add(1, 'hours').format('HH:mm'));
                    }

                    console.log(allDates, allTime);

                    $.ajax({
                           type: "POST",
                           url: "updateAvailability.php",
                           data: { avail_time : allTime,
                                   avail_date : allDates
                            },
                           success: function(data) {
                                  alert(data);
                            }
                    });
                }

                $('#datechooser').daterangepicker({
                    "timePicker": true,
                    "timePickerIncrement": 60,
                    "minDate": moment().startOf('date')
                }, cb);
            });
            </script>
        </div>
        <div class="col-lg-6">

        </div>
      </div>

      <div class="container bg-ligth">
        <div class="text-center pt-5 pb-2">
          <h3>Manage Task</h3>
          <p>Select a task to set your hourly rate and availability</p>
        </div>
      </div>

      <?php
      include('db_connect.php');
      $email = $_SESSION['email'];
      $q1 = "SELECT task_type FROM performs WHERE email = '$email'";
        $r1 = pg_query($db, $q1);
        $tasks = [];
      while($r2 = pg_fetch_assoc($r1)) {
        foreach($r2 as $value) {
          $tasks[] = $value;
        };
      };
    ?>


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
      $x = 0;
      foreach($tasks as $task):
      ?>

      <div class="panel panel-default" >
        <div class="panel-heading" role="tab" id="heading<?php echo $x ?>">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x; ?>" aria-expanded="false"><?php echo $task ?></a>
          </h4>
        </div>
        <div id="collapse<?php echo $x; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $x; ?>">
          <div class="panel-body">
            <div class="pt-3">
              <p for="price">Set Desired Hourly Rate</p>
            </div>
            <div class="input-group mb-3 pb-3" style="width: 200px;">
               <!-- specify pattern -->
              <input type="text" id="price<?php echo $x; ?>" name="price" class="form-control" placeholder="Price" aria-label="price" aria-describedby="basic-addon2">
              <div style='display:none'>
                <input type="text" id="task_type<?php echo $x; ?>" value=<?php echo "'".$task."'"?>>
              </div>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" id ="submit" name="submit" type="button" onclick="submitFunction(<?php echo $x; ?>)">Submit</button>
              </div>
            </div>
            <div class="pt-3">
              <label for="exampleFormControlTextarea1">Describe your qualifications and tell the users why you're a suitable candidate for this task</label>
              <textarea class="form-control" name="task_details" id="task_details" rows="5" placeholder="Hi! I do things. And I do things" required></textarea>
            </div>
          </div>
        </div>
      </div>

      <?php $x++; endforeach;?>
    </div>

  </body>

  <script>
      function submitFunction(x) {
        var price = document.getElementById("price"+x).value;
        var task_type = document.getElementById("task_type"+x).value;
        if (price == '') {
          alert("Please enter a price");
        } else {
          $.ajax({
            type: "POST",
            url: 'add_price_availability.php',
            data: {price: price,
                   task_type: task_type
                  },
            success: function(data) {
              alert(data);
            }
          });
        }
      }
    </script>


</html>
