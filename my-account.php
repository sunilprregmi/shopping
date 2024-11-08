<?php
session_start();
error_reporting(0);
include('assets/includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else {
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$contactno = $_POST['contactno'];
		$query = mysqli_query($con, "update users set name='$name',contactno='$contactno' where id='" . $_SESSION['id'] . "'");
		if ($query) {
			echo "<script>alert('Your info has been updated');</script>";
		}
	}


	date_default_timezone_set('Asia/Kolkata'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
		$num = mysqli_fetch_array($sql);
		if ($num > 0) {
			$con = mysqli_query($con, "update students set password='" . md5($_POST['newpass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
			echo "<script>alert('Password Changed Successfully !!');</script>";
		} else {
			echo "<script>alert('Current Password not match !!');</script>";
		}
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>Shopping Portal Home Page</title>
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/rateit.css">

	<!-- bettercss debloat -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300;400;600;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" integrity="sha512-cp9JSDyi0CDCvBfFKYLWXevb3r8hRv5JxcxLkUq/LEtAmOg7X0yzR3p0x/g+S3aWcZw18mhxsCXyelKWmXgzzg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" integrity="sha512-4eq9I5xSOX1V/b5eZj7Iq6ofTAxMZeMAz8m9YHUq6YP/zlviP4fFYOIlo5BW1ImnzZ3vLMb01ciQjO9WY6wFaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" integrity="sha512-RWhcC19d8A3vE7kpXq6Ze4GcPfGe3DQWuenhXAbcGiZOaqGojLtWwit1eeM9jLGHFv8hnwpX3blJKGjTsf2HxQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css" integrity="sha512-4ioNqjewIy2hSnYs7smFWpvzAB4xcD6NnR2z6ydUZEBg0UDVW3IoKATPoVYMyzKexe8yFU6sPd2VypoH2ZjCTQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

	<body class="cnt-home">
		<header class="header-style-1">

			<!-- ============================================== TOP MENU ============================================== -->
			<?php include('assets/includes/top-header.php'); ?>
			<!-- ============================================== TOP MENU : END ============================================== -->
			<?php include('assets/includes/main-header.php'); ?>
			<!-- ============================================== NAVBAR ============================================== -->
			<?php include('assets/includes/menu-bar.php'); ?>
			<!-- ============================================== NAVBAR : END ============================================== -->

		</header>
		<!-- ============================================== HEADER : END ============================================== -->
		<div class="breadcrumb">
			<div class="container">
				<div class="breadcrumb-inner">
					<ul class="list-inline list-unstyled">
						<li><a href="#">Home</a></li>
						<li class='active'>Checkout</li>
					</ul>
				</div><!-- /.breadcrumb-inner -->
			</div><!-- /.container -->
		</div><!-- /.breadcrumb -->

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="checkout-box inner-bottom-sm">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-group checkout-steps" id="accordion">
								<!-- checkout-step-01  -->
								<div class="panel panel-default checkout-step-01">

									<!-- panel-heading -->
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
												<span>1</span>My Profile
											</a>
										</h4>
									</div>
									<!-- panel-heading -->

									<div id="collapseOne" class="panel-collapse collapse in">

										<!-- panel-body  -->
										<div class="panel-body">
											<div class="row">
												<h4>Personal info</h4>
												<div class="col-md-12 col-sm-12 already-registered-login">

													<?php
													$query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
													while ($row = mysqli_fetch_array($query)) {
													?>

														<form class="register-form" role="form" method="post">
															<div class="form-group">
																<label class="info-title" for="name">Name<span>*</span></label>
																<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name']; ?>" id="name" name="name" required="required">
															</div>



															<div class="form-group">
																<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
																<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email']; ?>" readonly>
															</div>
															<div class="form-group">
																<label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
																<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno']; ?>" maxlength="10">
															</div>
															<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
														</form>
													<?php } ?>
												</div>
												<!-- already-registered-login -->

											</div>
										</div>
										<!-- panel-body  -->

									</div><!-- row -->
								</div>
								<!-- checkout-step-01  -->
								<!-- checkout-step-02  -->
								<div class="panel panel-default checkout-step-02">
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
												<span>2</span>Change Password
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse">
										<div class="panel-body">

											<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
												<div class="form-group">
													<label class="info-title" for="Current Password">Current Password<span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
												</div>



												<div class="form-group">
													<label class="info-title" for="New Password">New Password <span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
												</div>
												<div class="form-group">
													<label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required">
												</div>
												<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Change </button>
											</form>




										</div>
									</div>
								</div>
								<!-- checkout-step-02  -->

							</div><!-- /.checkout-steps -->
						</div>
						<?php include('assets/includes/myaccount-sidebar.php'); ?>
					</div><!-- /.row -->
				</div><!-- /.checkout-box -->
				<?php include('assets/includes/brands-slider.php'); ?>

			</div>
		</div>
		<?php include('assets/includes/footer.php'); ?>

		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.cpass.value == "") {
					alert("Current Password Filed is Empty !!");
					document.chngpwd.cpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value == "") {
					alert("New Password Filed is Empty !!");
					document.chngpwd.newpass.focus();
					return false;
				} else if (document.chngpwd.cnfpass.value == "") {
					alert("Confirm Password Filed is Empty !!");
					document.chngpwd.cnfpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
					alert("Password and Confirm Password Field do not match  !!");
					document.chngpwd.cnfpass.focus();
					return false;
				}
				return true;
			}
		</script>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- betterjs debloat -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js" integrity="sha512-YLRWtHhN2xhcLgX+SgsCeBE2g+1D5Jr3nJV+CRhIkeChx3XZLDOIlAtD6efyUM5G2jXrkFfjjISz70TR+Ll6nQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js" integrity="sha512-1V1L62xiOYRFk+A1ReMV5KdG9V+daXtErNnmJkWnvDiuu+bU4ncOL3UsqlSHgPfrzZyGxnzuuNvHkxG16eqUgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" integrity="sha512-PxtG6eoPtr5QdgWieDr0Bsa0+IXe2qRAG/8gSw/pBWZWcXQRAhWU4lEumKTjmOMjgmen3q/robV+RD3sqwR36g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.js" integrity="sha512-nDhjpAMtmCcu07+GipM1Fvktk7cNhaINGVPAzfNa5pVvrTtl1kTZj7J16qN2/lzqXiBPHAOEZH/6UJFZx7MVvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/4.5.0/bootstrap-slider.min.js" integrity="sha512-otK1ZhAwrImzcpoNhlwHn84/mauUtxhtO1hezHQ3DPRo1Tx21gVPoUxDOjfK+71tIKKlR3qzsa7uLUfNrVlAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha512-ahmSZKApTDNd3gVuqL5TQ3MBTj8tL5p2tYV05Xxzcfu6/ecvt1A0j6tfudSGBVuteSoTRMqMljbfdU0g2eDNUA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
<?php } ?>