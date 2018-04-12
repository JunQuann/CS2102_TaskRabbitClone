<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php require_once("header.php") ?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="index.php">
						<img src="img/brand_icon.jpeg">
						</a>
					</div>

                    <?php include('login_auth.php') ?>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST">

								<div class="form-group">
									<label for="email">E-Mail Address</label>

									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password </label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

                                <div class="mb-3 text-danger">
                                    <?php echo $loginError ?>
                                </div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="margin-top20 text-center">
									Don't have an account? <a href="register.php">Create One</a>
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
