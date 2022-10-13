<?php


include('./includes/variables.php');
include_once('includes/custom-functions.php');
$fn = new custom_functions;
$db = new Database();
$db->connect();
	
if (isset($_POST['btnLogin'])) {

    // get email and password
    $email = $db->escapeString($_POST['email']);
    $password = $db->escapeString($_POST['password']);

    // set time for session timeout
    $currentTime = time() + 25200;
    $expired = 3600;

    // create array variable to handle error
    $error = array();

    // check whether $email is empty or not
    if (empty($email)) {
        $error['email'] = "*Email should be filled.";
    }

    // check whether $password is empty or not
    if (empty($password)) {
        $error['password'] = "*Password should be filled.";
    }

    // if email and password is not empty, check in database
    if (!empty($email) && !empty($password)) {
        if($email == 'admin' && $password == 'admin123'){
            $_SESSION['id'] = '1';
            $_SESSION['role'] ='admin';
            $_SESSION['username'] = 'username';
            $_SESSION['email'] = 'admin@gmail.com';
            $_SESSION['timeout'] = $currentTime + $expired;
            header("location:home.php");
            
        }
        else{
            $error['failed'] = "<span class='label label-danger'>Invalid Email or Password!</span>";
        }
    }
}
?>


<!doctype html>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/Kaalagyaan/v1-x/02-design-dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 14:57:46 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Kaalagyaan App">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Kaalagyaan Login</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body class="authentication">

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<!-- Loading wrapper end -->

		<!-- *************
			************ Login container start *************
		************* -->
		<div class="login-container">

			<div class="container-fluid h-100">
			
			<!-- Row start -->
			<div class="row g-0 h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<h1>Kaalagyaan</h1>
							
						</div>
						
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
                
						<form  method="post" enctype="multipart/form-data">
							<div class="login-screen">
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="img/logo-colors.svg" alt="Uni Pro Admin">
									</a>
									<h6>Welcome back,<br>Please login to your account.</h6>
									<center>
										<div class="msg text text-danger" ><?php echo isset($error['failed']) ? $error['failed'] : ''; ?></div>
									</center>
									<br>
									<div class="field-wrapper">
										<input type="text" name="email"  value="<?= defined('ALLOW_MODIFICATION') && ALLOW_MODIFICATION == 0 ? 'admin' : '' ?>" required autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" name="password" value="<?= defined('ALLOW_MODIFICATION') && ALLOW_MODIFICATION == 0 ? 'admin123' : '' ?>" required>
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">
										<!-- <a href="forgot-password.html">Forgot password?</a> -->
										<button type="submit" name="btnLogin"  class="btn btn-primary">Login</button>
									</div>
								</div>
								<!-- <div class="login-footer">
									<span class="additional-link">No Account? <a href="signup.html" class="btn btn-light">Sign Up</a></span>
								</div> -->
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->

		
			</div>
		</div>
		<!-- *************
			************ Login container end *************
		************* -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/moment.js"></script>
		
		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/Kaalagyaan/v1-x/02-design-dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 14:57:47 GMT -->
</html>