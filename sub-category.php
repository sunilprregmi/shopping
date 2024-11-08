<?php
session_start();
error_reporting(0);
include('assets/includes/config.php');
$cid = intval($_GET['scid']);
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
			echo "<script>alert('Product has been added to the cart')</script>";
			echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		} else {
			$message = "Product ID is invalid";
		}
	}
}
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
	if (strlen($_SESSION['login']) == 0) {
		header('location:login.php');
	} else {
		mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','" . $_GET['pid'] . "')");
		echo "<script>alert('Product aaded in wishlist');</script>";
		header('location:my-wishlist.php');
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
	</div><!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row outer-bottom-sm'>
				<div class='col-md-3 sidebar'>
					<!-- ================================== TOP NAVIGATION ================================== -->
					<!-- ================================== TOP NAVIGATION : END ================================== -->
					<div class="sidebar-module-container">
						<h3 class="section-title">shop by</h3>
						<div class="sidebar-filter">
							<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
							<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
								<div class="widget-header m-t-20">
									<h4 class="widget-title">Category</h4>
								</div>
								<div class="sidebar-widget-body m-t-10">
									<?php $sql = mysqli_query($con, "select id,categoryName  from category");
									while ($row = mysqli_fetch_array($sql)) {
									?>
										<div class="accordion">
											<div class="accordion-group">
												<div class="accordion-heading">
													<a href="category.php?cid=<?php echo $row['id']; ?>" class="accordion-toggle collapsed">
														<?php echo $row['categoryName']; ?>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div><!-- /.sidebar-widget-body -->
							</div><!-- /.sidebar-widget -->




							<!-- ============================================== COLOR: END ============================================== -->

						</div><!-- /.sidebar-filter -->
					</div><!-- /.sidebar-module-container -->
				</div><!-- /.sidebar -->
				<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->

					<div id="category" class="category-carousel hidden-xs">
						<div class="item">
							<div class="image">
								<img src="assets/images/banners/cat-banner-2.jpg" alt="" class="img-responsive">
							</div>
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text">
										<br />
									</div>

									<?php $sql = mysqli_query($con, "select subcategory  from subcategory where id='$cid'");
									while ($row = mysqli_fetch_array($sql)) {
									?>

										<div class="excerpt hidden-sm hidden-md">
											<?php echo htmlentities($row['subcategory']); ?>
										</div>
									<?php } ?>

								</div><!-- /.caption -->
							</div><!-- /.container-fluid -->
						</div>
					</div>

					<div class="search-result-container">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active " id="grid-container">
								<div class="category-product  inner-top-vs">
									<div class="row">
										<?php
										$ret = mysqli_query($con, "select * from products where subCategory='$cid'");
										$num = mysqli_num_rows($ret);
										if ($num > 0) {
											while ($row = mysqli_fetch_array($ret)) { ?>
												<div class="col-sm-6 col-md-4 wow fadeInUp">
													<div class="products">
														<div class="product">
															<div class="product-image">
																<div class="image">
																	<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="" width="200" height="300"></a>
																</div><!-- /.image -->
															</div><!-- /.product-image -->


															<div class="product-info text-left">
																<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
																<div class="rating rateit-small"></div>
																<div class="description"></div>

																<div class="product-price">
																	<span class="price">
																		Rs. <?php echo htmlentities($row['productPrice']); ?> </span>
																	<span class="price-before-discount">Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

																</div><!-- /.product-price -->

															</div><!-- /.product-info -->
															<div class="cart clearfix animate-effect">
																<div class="action">
																	<ul class="list-unstyled">
																		<li class="add-cart-button btn-group">
																			<?php if ($row['productAvailability'] == 'In Stock') { ?>
																				<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																					<i class="fa fa-shopping-cart"></i>
																				</button>
																				<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
																					<button class="btn btn-primary" type="button">Add to cart</button></a>
																			<?php } else { ?>
																				<div class="action" style="color:red">Out of Stock</div>
																			<?php } ?>

																		</li>

																		<li class="lnk wishlist">
																			<a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist" title="Wishlist">
																				<i class="icon fa fa-heart"></i>
																			</a>
																		</li>


																	</ul>
																</div><!-- /.action -->
															</div><!-- /.cart -->
														</div>
													</div>
												</div>
											<?php }
										} else { ?>

											<div class="col-sm-6 col-md-4 wow fadeInUp">
												<h3>No Product Found</h3>
											</div>

										<?php } ?>










									</div><!-- /.row -->
								</div><!-- /.category-product -->

							</div><!-- /.tab-pane -->



						</div><!-- /.search-result-container -->

					</div><!-- /.col -->
				</div>
			</div>
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