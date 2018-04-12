<!DOCTYPE html>
<html>

<?php require_once("header.php") ?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/brand_icon.jpeg">
					</div>

                    <?php include("add_user.php") ?>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label for="postal_code">Postal Code</label>
									<input id="postal_code" type="text" pattern="[0-9]{6}" class="form-control" name="postal_code"
									 oninvalid="this.setCustomValidity('Please enter a valid Postal Code')"
									 oninput="setCustomValidity('')" required>
								</div>

								<div class="mb-3 text-danger">
									<?php echo $duplicateErr ?>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="margin-top20 text-center">
									Already have an account? <a href="sign_in.php">Login</a>
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
