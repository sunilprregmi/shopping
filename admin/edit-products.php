<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	$pid = intval($_GET['id']); // product id
	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$subcat = $_POST['subcategory'];
		$productname = $_POST['productName'];
		$productcompany = $_POST['productCompany'];
		$productprice = $_POST['productprice'];
		$productpricebd = $_POST['productpricebd'];
		$productdescription = $_POST['productDescription'];
		$productscharge = $_POST['productShippingcharge'];
		$productavailability = $_POST['productAvailability'];

		$sql = mysqli_query($con, "update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd' where id='$pid' ");
		$_SESSION['msg'] = "Product Updated Successfully !!";
	}


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Insert Product</title>

		<!-- newcss -->
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap-responsive.min.css" integrity="sha512-0rKYOJOCP8+7TKeNDJhM0N+mOt4cqEkcuGpbklqUBJkZxsn4Ej8f6I5g13y/FQvTOgkghLWm5zzihl8LwxgyKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" integrity="sha512-XacuFyqxYaXVxu5jPfV2LF9ZpYO74CCAHQqAWIZcBbVuw2Qp56j3VFqCpyImxp3tD/UzvBr1Lp2mrssUcHuPZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>
		<?php include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Insert Product</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

										<?php

										$query = mysqli_query($con, "select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($query)) {



										?>


											<div class="control-group">
												<label class="control-label" for="basicinput">Category</label>
												<div class="controls">
													<select name="category" class="span8 tip" onChange="getSubcat(this.value);" required>
														<option value="<?php echo htmlentities($row['cid']); ?>"><?php echo htmlentities($row['catname']); ?></option>
														<?php $query = mysqli_query($con, "select * from category");
														while ($rw = mysqli_fetch_array($query)) {
															if ($row['catname'] == $rw['categoryName']) {
																continue;
															} else {
														?>

																<option value="<?php echo $rw['id']; ?>"><?php echo $rw['categoryName']; ?></option>
														<?php }
														} ?>
													</select>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Sub Category</label>
												<div class="controls">

													<select name="subcategory" id="subcategory" class="span8 tip" required>
														<option value="<?php echo htmlentities($row['subcatid']); ?>"><?php echo htmlentities($row['subcatname']); ?></option>
													</select>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Name</label>
												<div class="controls">
													<input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo htmlentities($row['productName']); ?>" class="span8 tip">
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Company</label>
												<div class="controls">
													<input type="text" name="productCompany" placeholder="Enter Product Comapny Name" value="<?php echo htmlentities($row['productCompany']); ?>" class="span8 tip" required>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Product Price Before Discount</label>
												<div class="controls">
													<input type="text" name="productpricebd" placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>" class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Price</label>
												<div class="controls">
													<input type="text" name="productprice" placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPrice']); ?>" class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Description</label>
												<div class="controls">
													<textarea name="productDescription" placeholder="Enter Product Description" rows="6" class="span8 tip">
<?php echo htmlentities($row['productDescription']); ?>
</textarea>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Shipping Charge</label>
												<div class="controls">
													<input type="text" name="productShippingcharge" placeholder="Enter Product Shipping Charge" value="<?php echo htmlentities($row['shippingCharge']); ?>" class="span8 tip" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="basicinput">Product Availability</label>
												<div class="controls">
													<select name="productAvailability" id="productAvailability" class="span8 tip" required>
														<option value="<?php echo htmlentities($row['productAvailability']); ?>"><?php echo htmlentities($row['productAvailability']); ?></option>
														<option value="In Stock">In Stock</option>
														<option value="Out of Stock">Out of Stock</option>
													</select>
												</div>
											</div>



											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image1</label>
												<div class="controls">
													<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['id']; ?>">Change Image</a>
												</div>
											</div>


											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image2</label>
												<div class="controls">
													<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage2']); ?>" width="200" height="100"> <a href="update-image2.php?id=<?php echo $row['id']; ?>">Change Image</a>
												</div>
											</div>



											<div class="control-group">
												<label class="control-label" for="basicinput">Product Image3</label>
												<div class="controls">
													<img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage3']); ?>" width="200" height="100"> <a href="update-image3.php?id=<?php echo $row['id']; ?>">Change Image</a>
												</div>
											</div>
										<?php } ?>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>





						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script>
			$(document).ready(function() {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(nicEditors.allTextAreas);
		</script>
		<script>
			function getSubcat(val) {
				$.ajax({
					type: "POST",
					url: "get_subcat.php",
					data: 'cat_id=' + val,
					success: function(data) {
						$("#subcategory").html(data);
					}
				});
			}

			function selectCountry(val) {
				$("#search-box").val(val);
				$("#suggesstion-box").hide();
			}
		</script>

		<!-- newmod -->
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" integrity="sha512-O9+lxqugcxqFCD3ae+UPJpX/q0+IspPN6H3WmQuVVfHRGxdbQ0+Oaz+1b7NL5sfncvf+aGWChjAg9x+4k4xotA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/bootstrap.min.js" integrity="sha512-rtzOS/8EQUrRPBIN//UBMUNO7N/R9aX8DBA5kM2kJouvdS/u8lcOx7dO4sde6qZP1aic7vkDPd6gyezhWX7cQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	</body>

	</html>
<?php } ?>