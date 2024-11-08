<?php
session_start();
error_reporting(0);
include('assets/includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
	$id = intval($_GET['id']);
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity']++;
	} else {
		$sql_p = "SELECT * FROM products WHERE id={$id}";
		$query_p = mysqli_query($con, $sql_p);
		if (mysqli_num_rows($query_p) != 0) {
			$row_p = mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
		} else {
			$message = "Product ID is invalid";
		}
	}
	echo "<script>alert('Product has been added to the cart')</script>";
	echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
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
	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('assets/includes/top-header.php'); ?>
		<?php include('assets/includes/main-header.php'); ?>
		<?php include('assets/includes/menu-bar.php'); ?>
	</header>
	<!-- ============================================== HEADER : END ============================================== -->

	<div class="body-content outer-top-xs" id="top-banner-and-menu">
		<div class="container">
			<div class="furniture-container homepage-container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
						<!-- ================================== TOP NAVIGATION ================================== -->
						<?php include('assets/includes/side-menu.php'); ?>
						<!-- ================================== TOP NAVIGATION : END ================================== -->
					</div><!-- /.sidemenu-holder -->

					<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

						<!-- ========================================== SECTION – HERO ========================================= -->
						<div id="hero" class="homepage-slider3">
							<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
								<div class="full-width-slider">
									<div class="item" style="background-image: url(assets/images/sliders/slider1.png);">
										<!-- /.container-fluid -->
									</div><!-- /.item -->
								</div><!-- /.full-width-slider -->
								<div class="full-width-slider">
									<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider2.png);">
									</div><!-- /.item -->
								</div><!-- /.full-width-slider -->
							</div><!-- /.owl-carousel -->
						</div>
						<!-- ========================================= SECTION – HERO : END ========================================= -->

						<!-- ============================================== INFO BOXES ============================================== -->
						<div class="info-boxes wow fadeInUp">
							<div class="info-boxes-inner">
								<div class="row">
									<div class="col-md-6 col-sm-4 col-lg-4">
										<div class="info-box">
											<div class="row">
												<div class="col-xs-2">
													<i class="icon fa fa-dollar"></i>
												</div>
												<div class="col-xs-10">
													<h4 class="info-box-heading green">money back</h4>
												</div>
											</div>
											<h6 class="text">30 Day Money Back Guarantee.</h6>
										</div>
									</div><!-- .col -->

									<div class="hidden-md col-sm-4 col-lg-4">
										<div class="info-box">
											<div class="row">
												<div class="col-xs-2">
													<i class="icon fa fa-truck"></i>
												</div>
												<div class="col-xs-10">
													<h4 class="info-box-heading orange">free shipping</h4>
												</div>
											</div>
											<h6 class="text">free ship-on oder over Rs. 600.00</h6>
										</div>
									</div><!-- .col -->

									<div class="col-md-6 col-sm-4 col-lg-4">
										<div class="info-box">
											<div class="row">
												<div class="col-xs-2">
													<i class="icon fa fa-gift"></i>
												</div>
												<div class="col-xs-10">
													<h4 class="info-box-heading red">Special Sale</h4>
												</div>
											</div>
											<h6 class="text">All items-sale up to 20% off </h6>
										</div>
									</div><!-- .col -->
								</div><!-- /.row -->
							</div><!-- /.info-boxes-inner -->
						</div><!-- /.info-boxes -->
						<!-- ============================================== INFO BOXES : END ============================================== -->

					</div><!-- /.homebanner-holder -->
				</div><!-- /.row -->

				<!-- ============================================== SCROLL TABS ============================================== -->
				<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
					<div class="more-info-tab clearfix">
						<h3 class="new-product-title pull-left">Featured Products</h3>
						<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
							<li class="active"><a href="#all" data-toggle="tab">All</a></li>
							<li><a href="#books" data-toggle="tab">Books</a></li>
							<li><a href="#furniture" data-toggle="tab">Furniture</a></li>
						</ul><!-- /.nav-tabs -->
					</div>

					<div class="tab-content outer-top-xs">
						<div class="tab-pane in active" id="all">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
									<?php $ret = mysqli_query($con, "select * from products");
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>
														<div class="product-price">
															<span class="price">
																Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?> </span>
														</div><!-- /.product-price -->
													</div><!-- /.product-info -->
													<?php if ($row['productAvailability'] == 'In Stock') { ?>
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
													<?php } else { ?>
														<div class="action" style="color:red">Out of Stock</div>
													<?php } ?>
												</div><!-- /.product -->
											</div><!-- /.products -->
										</div><!-- /.item -->
									<?php } ?>
								</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div>

						<div class="tab-pane" id="books">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
									<?php $ret = mysqli_query($con, "select * from products where category=3");
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																Rs. <?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
														</div><!-- /.product-price -->
													</div><!-- /.product-info -->
													<?php if ($row['productAvailability'] == 'In Stock') { ?>
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
													<?php } else { ?>
														<div class="action" style="color:red">Out of Stock</div>
													<?php } ?>
												</div><!-- /.product -->
											</div><!-- /.products -->
										</div><!-- /.item -->
									<?php } ?>
								</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div>

						<div class="tab-pane" id="furniture">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
									<?php $ret = mysqli_query($con, "select * from products where category=5");
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div>
													</div>
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>
														<div class="product-price">
															<span class="price">
																Rs.<?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
														</div>
													</div>
													<?php if ($row['productAvailability'] == 'In Stock') { ?>
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
													<?php } else { ?>
														<div class="action" style="color:red">Out of Stock</div>
													<?php } ?>
												</div>

											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- ============================================== TABS ============================================== -->
				<div class="sections prod-slider-small outer-top-small">
					<div class="row">
						<div class="col-md-6">
							<section class="section">
								<h3 class="section-title">Smart Phones</h3>
								<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
									<?php $ret = mysqli_query($con, "select * from products where category=4 and subCategory=4");
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300"></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>
														<div class="product-price">
															<span class="price">
																Rs. <?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
														</div>
													</div>
													<?php if ($row['productAvailability'] == 'In Stock') { ?>
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
													<?php } else { ?>
														<div class="action" style="color:red">Out of Stock</div>
													<?php } ?>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</section>
						</div>
						<div class="col-md-6">
							<section class="section">
								<h3 class="section-title">Laptops</h3>
								<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
									<?php $ret = mysqli_query($con, "select * from products where category=4 and subCategory=6");
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="300" height="300"></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																Rs .<?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
														</div>
													</div>
													<?php if ($row['productAvailability'] == 'In Stock') { ?>
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
													<?php } else { ?>
														<div class="action" style="color:red">Out of Stock</div>
													<?php } ?>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</section>
						</div>
					</div>
				</div>
				<!-- ============================================== TABS : END ============================================== -->

				<section class="section featured-product inner-xs wow fadeInUp">
					<h3 class="section-title">Fashion</h3>
					<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
						<?php $ret = mysqli_query($con, "select * from products where category=6");
						while ($row = mysqli_fetch_array($ret)) { ?>
							<div class="item">
								<div class="products">
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-6">
													<div class="product-image">
														<div class="image">
															<a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']); ?>">
																<img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="170" height="174" alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div><!-- /.image -->

													</div><!-- /.product-image -->
												</div><!-- /.col -->
												<div class="col col-xs-6">
													<div class="product-info">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																Rs. <?php echo htmlentities($row['productPrice']); ?>
															</span>

														</div><!-- /.product-price -->
														<?php if ($row['productAvailability'] == 'In Stock') { ?>
															<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
														<?php } else { ?>
															<div class="action" style="color:red">Out of Stock</div>
														<?php } ?>
													</div>
												</div><!-- /.col -->
											</div><!-- /.product-micro-row -->
										</div><!-- /.product-micro -->
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>
				<?php include('assets/includes/brands-slider.php'); ?>
			</div>
		</div>
		<?php include('assets/includes/footer.php'); ?>

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