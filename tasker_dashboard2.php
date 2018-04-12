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
              <a class="navbar-brand" href="home.php">TaskBunny</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="#">Account</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

      <div class="row">
        <div class="col-lg-6">
                <div class="text-center">
                    <label for="button">Choose your available timing for the whole range of date selected</label>
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

        <div class="col-6">
          <div class="text-center">
            <h5>Click on a request to accept or decline it</h5>
          </div>
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
                            <th>Address</th>
                            <th>Accept?</th>
                        </tr>
                    </thead>
                    <?php
                        include('db_connect.php');
                        $email = $_SESSION['email'];
                        $q1 = "SELECT * FROM userTaskerTaskPair WHERE tasker_email = '$email'";
                        $r1 = pg_query($db, $q1);
                        $count = 1;

                        if (pg_num_rows($r1) > 0) {
                            while($row = pg_fetch_assoc($r1)) {
                    ?>

                    <tbody>
                        <tr class="table clickable-row" data-toggle="modal" data-target="#modalAccept<?php echo $count?>" style="cursor: pointer">
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
                            <td><?php echo $row['address'] ?></td>
                            <?php if ($row['status'] == 'PENDING') { ?>
                            <td><?php echo '<span style="color:orange">Pending</span>'?></td>
                            <?php }?>
                            <?php if ($row['status'] == 'ACCEPTED') { ?>
                            <td><?php echo '<span style="color:green">Accepted</span>'?></td>
                            <?php }?>
                            <?php if ($row['status'] == 'REJECTED') { ?>
                            <td><?php echo '<span style="color:red">Declined</span>'?></td>
                            <?php }?>
                        </tr>
                    </tbody>

                    <!-- Modal -->

                    <div class="modal fade" id="modalAccept<?php echo $count?>" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize"><?php echo $row['task_type']?> Task</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <ul>
                              <li style="text-transform: capitalize"><b>Task type</b>: <?php echo $row['task_type']?></li>
                              <li style="text-transform: capitalize"><b>Duration</b>: <?php echo $row['duration']?> hour</li>
                              <li style="text-transform: capitalize"><b>Address</b>: <?php echo $row['address']?></li>
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="taskAccept(true, '<?php echo $row['duration'];?>', '<?php echo $row['task_type'];?>', '<?php echo $row['user_email'];?>', '<?php echo $row['chosen_date'];?>', '<?php echo $row['chosen_time'];?>', '<?php echo $row['tasker_email'];?>')">Accept</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="taskAccept(false, '<?php echo $row['duration'];?>', '<?php echo $row['task_type'];?>', '<?php echo $row['user_email'];?>', '<?php echo $row['chosen_date'];?>', '<?php echo $row['chosen_time'];?>', '<?php echo $row['tasker_email'];?>')">Decline</button>
                          </div>
                        </div>
                      </div>
                    </div>

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

      <div class="container bg-light">
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
            <a role="button" data-toggle="collapse" style="text-transform:uppercase" data-parent="#accordion" href="#collapse<?php echo $x; ?>" aria-expanded="false"><?php echo $task ?></a>
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

      function taskAccept(x, duration, tasktype, useremail, date, time, taskeremail) {
          var user_email = useremail;
          var task_type = tasktype;
          var chosen_date = date;
          var chosen_time = time;
          var tasker_email = taskeremail;
        if (x == true) {
          var status = 'ACCEPTED';
        } else {
          var status = 'REJECTED';
        }
        $.ajax({
          type: "POST",
          url: 'pairing.php',
          data: {user_email: user_email,
                 duration: duration,
                 tasker_email: tasker_email,
                 task_type: task_type,
                 chosen_date: chosen_date,
                 chosen_time: chosen_time,
                 status: status
                },
          success: function(data) {
            alert(data);
            location.reload();
          }
        });
      }
    </script>
