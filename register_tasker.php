<?php include("login_check.php") ?>

<!DOCTYPE html>
<html>

<?php require_once("header.php") ?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg">
					</div>

                    <?php include("add_tasker.php") ?>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Become a Tasker</h4>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

								<div class="form-group">
									<h4 for="task"> Tasks</h4>
									<input type="checkbox" name="task[]" value="cleaning"> Cleaning<br>
  									<input type="checkbox" name="task[]" value="moving and packing" checked="checked">Moving and Packing<br>


								<div class="form-group">
									<label for="address">Address</label>
									<input id="address" type="text" class="form-control" name="address" required autofocus>
								</div>

								<div class="form-group">
									<label for="phone">Phone Number</label>
									<input id="phone" type="text" class="form-control" name="phone" required>
								</div>

								<div class="mb-3 text-danger">
									<?php echo $doneErr ?>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require_once("footer.php") ?>

</body>
</html>
