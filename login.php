<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="lg.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="rsudimy/assets/images/dasb.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/log.css">
	<link rel="stylesheet" type="text/css" href="css/awesome.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--<script src="js/login.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<img src="img/lgx.png" width="100%">
					</div>
					<!-- y -->
					<form action="user_levels.php" method="post">
						<div class="form-input">
							<span><i class="fa fa-user-md"></i></span>
							<input type="text" placeholder="Username" required name="USERNAME">
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" required name="PWD">
						</div>
						<div class="row mb-3">
							<div class="col-6 d-flex">
								 <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Remember me</label>
								</div> 
							</div>
							<!-- <div class="col-6 text-right">
								<a href="forget.html" class="forget-link">Forget Password</a>
							</div> -->
						</div>
						<div class="text-left mb-3">
							<button type="submit" class="btn">Login</button>	 
							
							<!--<a href="http://103.233.153.198/simra/view.php">	<button type="button" class="btn">View</button>	</a>-->
						</div>
						<div class="text-center mb-2">
							
<br><br>
						

							<!--<a href="https://www.instagram.com/rsud%20kabindramayu" class="btn btn-social btn-google">IG</a>

							<a href="https://www.instagram.com/rsud_indramayu" class="btn btn-social btn-twitter">twitter</a> -->
						</div>
						<div class="mb-3" style="color: #fff"><a style="color:#fff;font-size:12px" >   </a><a style="color:#fff;font-size:12px" >Copyright&copy; 2022 Eagle@Soft</a></div>
						<!-- <div style="color: #777">Belum punya akun 
							<a href="register.html" class="register-link">Daftar disini</a>
						</div> -->
					</form>
	
				</div>
			</div>
		</div>
	</div>
</body>
</html>
