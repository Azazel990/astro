<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flat Able</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form action="login1" method="POST">
						@csrf
						<?php 
							if(session()->has("login")){
								?>
									<x-alert_msg type="danger" msg="Unauthorized! Login Details Not found" />
								<?php
							}
						?>
						
						<div class="card-body">

							<h4 class="mb-3 f-w-400">Login</h4>
							<hr>
							<div class="form-group mb-3">
								<input type="text" class="form-control" id="Email" placeholder="Username" name="username">
								@error("username")<div class="invalid-feedback text-left">{{$message}}</div>@enderror
							</div>
							<div class="form-group mb-4">
								<input type="password" class="form-control" id="Password" placeholder="Password" name="password">
								@error("password")<div class="invalid-feedback text-left">{{$message}}</div>@enderror
							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1" name="remember_me" value="yes">
								<label class="custom-control-label" for="customCheck1">Save credentials.</label>
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit">Login</button>
							<hr>
							<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>
</body>

</html>
