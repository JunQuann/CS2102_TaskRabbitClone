<?php include('login_check.php') ?>

<!DOCTYPE html>
<html>

    <?php require_once('header.php') ?>
    <link rel="stylesheet" href="css/request.css">

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
                            <p><b>1. Fill Out Task Details</b></p>
                        </div>
                        <div class="col">
                            <p>2. View Tasker and Price</p>
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
                <h3>Describe Your Task</h3>
                <p>We need these inputs to show only qualified and available Taskers for the job.</p>
            </div>
        </div>

        <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['task_dur'] == 'option1') {
                $_SESSION['duration'] = 1;
            }
            if ($_POST['task_dur'] == 'option2') {
                $_SESSION['duration']  = 2;
            }
            if ($_POST['task_dur'] == 'option2') {
                $_SESSION['duration']  = 3;
            }
            $_SESSION['task_details']  = $_POST['task_details'];
            header('Location: request_2.php');
            die();
        }?>

        <div class="card mx-auto mb-5" style="width: 70rem;">
            <div class="card-body">
                <h4 class="card-title">How Big is your Task?</h4>
                <hr>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                    <div class="form-group mb-5 row">
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="task_dur" id="inlineRadio1" value="option1" required>
                              <label class="form-check-label" for="inlineRadio1"><b>Small - Est. 1 hr</b></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="task_dur" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2"><b>Medium - Est. 2 hrs</b></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="task_dur" id="inlineRadio3" value="option3">
                              <label class="form-check-label" for="inlineRadio3"><b>Large - Est. 3+ hrs</b></label>
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title">Tell us the Details</h4>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Start the conversation and tell your Tasker what you need done. This helps us match you with the best ones for the job. Don't worry, you can edit this later.</label>
                        <textarea class="form-control" name="task_details" id="task_details" rows="5" placeholder="Hi! Looking for help updating my 650 sq ft apartment. I’m on the 2nd floor up a short flight of stairs. Please bring an electric drill and ring doorbell number 3. Thanks!" required></textarea>
                    </div>

                    <div class="form-group no-margin mx-auto" style="width: 30%">
                        <button type="submit" class="btn btn-success btn-block">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>

    <?php require_once('footer.php') ?>
</html>
