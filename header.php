<?php include_once('includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");

include('includes/variables.php');
include_once('includes/custom-functions.php');
include_once('includes/functions.php');
$fn = new custom_functions;

?>

<!doctype html>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/unipro/v1-x/02-design-dark/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 14:54:45 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png">




		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">

		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Mega Menu -->
		<link rel="stylesheet" href="vendor/megamenu/css/megamenu.css">

		<!-- Search Filter JS -->
		<link rel="stylesheet" href="vendor/search-filter/search-filter.css">
		<link rel="stylesheet" href="vendor/search-filter/custom-search-filter.css">

		<!-- Steps Wizard CSS -->
		<link rel="stylesheet" href="vendor/wizard/jquery.steps.css" />

		<!-- Summernote CSS -->
		<link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />

		<!-- Bootstrap Select CSS -->
		<link rel="stylesheet" href="vendor/bs-select/bs-select.css" />

		<!-- Uploader CSS -->
		<link rel="stylesheet" href="vendor/dropzone/dropzone.min.css" />

		<!-- Input Tags css -->
		<link rel="stylesheet" href="vendor/input-tags/tagsinput.css" />

		<!--data table-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">

	<!--msg styles-->
	<style>
		.content-header{
			margin-left:20px!important;
			margin-bottom:10px!important;
		}
		.box-footer button{
			border-radius:20px;
		}
		.box-footer input{
			border-radius:20px;
		}
	</style>
</head>
		
	</head>
	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav class="sidebar-wrapper">

				<!-- Sidebar content start -->
				<div class="sidebar-tabs">

					<!-- Tabs nav start -->
					<div class="nav" role="tablist" aria-orientation="vertical">
						<a href="#" class="logo">
							<img src="img/logo.svg" alt="Uni Pro Admin">
						</a>
						<a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
							<i class="icon-home2"></i>
							<span class="nav-link-text">Dashboards</span>
						</a>
						<a class="nav-link " id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab" aria-controls="tab-product" aria-selected="false">
							<i class="icon-layers2"></i>
							<span class="nav-link-text">Cities</span>
						</a>
						
					</div>
					<!-- Tabs nav end -->

					<!-- Tabs content start -->
					<div class="tab-content">
								
						<!-- Chat tab -->
						<div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Dashboards
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="home.php">Dashboard</a>
										</li>
										<li>
											<a href="categories.php">Categories</a>
										</li>
										<li>
											<a href="homebanners.php"> Banners</a>
										</li>
										<li>
											<a href="hometrending-posts.php">Trending Posts</a>
										</li>
										<li>
											<a href="homegallery.php">Gallery</a>
										</li>
										<li>
											<a href="homefeatured-posts.php">Featured Posts</a>
										</li>
									</ul>
									
								</div>
							</div>
							<!-- Sidebar menu ends -->

							

						</div>

						<!-- Pages tab -->
						<div class="tab-pane fade show" id="tab-product" role="tabpanel" aria-labelledby="product-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Product
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="cities.php"> City</a>
										</li>
										<li>
											<a href="searchpagebanners.php">Banners</a>
										</li>
										<li>
											<a href="about.php">About Information</a>
										</li>
										<li>
											<a href="searchpage_accordions.php">Accordion Information</a>
										</li>
										<li>
											<a href="searchpagegallery.php" >Gallery</a>
										</li>
									</ul>
									
								</div>
							</div>
							<!-- Sidebar menu ends -->

							
						</div>

					

					</div>
					<!-- Tabs content end -->

				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Page header starts -->
				<div class="page-header">
					
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

							<!-- Search container start -->
							<div class="search-container">

								<!-- Toggle sidebar start -->
								<div class="toggle-sidebar" id="toggle-sidebar">
									<i class="icon-menu"></i>
								</div>
								<!-- Toggle sidebar end -->

								

								<!-- Search input group start -->
								<div class="ui fluid category search">
									<div class="ui icon input">
										<input class="prompt" type="text" placeholder="Search">
										<i class="search icon icon-search1"></i>
									</div>
									<div class="results"></div>
								</div>
								<!-- Search input group end -->

							</div>
							<!-- Search container end -->

						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

							<!-- Header actions start -->
							<ul class="header-actions">
								
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="avatar">
											<img src="img/user5.png" alt="User Avatar">
											<span class="status busy"></span>
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<!-- <a href="user-profile.html"><i class="icon-user1"></i>Profile</a>
											<a href="account-settings.html"><i class="icon-settings1"></i>Settings</a> -->
											<a href="index.php"><i class="icon-log-out1"></i>Logout</a>
										</div>
									</div>
								</li>
							</ul>
							<!-- Header actions end -->

						</div>
					</div>
					<!-- Row end -->					

				</div>
				<!-- Page header ends -->
         

	

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

		<!-- Megamenu JS -->
		<script src="vendor/megamenu/js/megamenu.js"></script>
		<script src="vendor/megamenu/js/custom.js"></script>
				
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Search Filter JS -->
		<script src="vendor/search-filter/search-filter.js"></script>
		<script src="vendor/search-filter/custom-search-filter.js"></script>

		<!-- Rating JS -->
		<script src="vendor/rating/raty.js"></script>
		<script src="vendor/rating/raty-custom.js"></script>

		<!-- Steps wizard JS -->
		<script src="vendor/wizard/jquery.steps.min.js"></script>
		<script src="vendor/wizard/jquery.steps.custom.js"></script>

		<!-- Summernote JS -->
		<script src="vendor/summernote/summernote-bs4.js"></script>

		<!-- Bootstrap Select JS -->
		<script src="vendor/bs-select/bs-select.min.js"></script>
		<script src="vendor/bs-select/bs-select-custom.js"></script>

		<!-- Dropzone JS -->
		<script src="vendor/dropzone/dropzone.min.js"></script>

		<!-- Input Tags JS -->
		<script src="vendor/input-tags/tagsinput.min.js"></script>
		<script src="vendor/input-tags/typeahead.js"></script>
		<script src="vendor/input-tags/tagsinput-custom.js"></script>

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

		<script>

			// Summernote
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 120,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
			});

		</script>

	</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/02-design-dark/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 14:55:18 GMT -->
</html>