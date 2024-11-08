<?php 
session_start();
error_reporting(0);
include('assets/includes/config.php');
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
<?php include('assets/includes/top-header.php');?>
<?php include('assets/includes/main-header.php');?>
<?php include('assets/includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">#</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-total item">Grandtotal</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Order Date</th>
					<th class="cart-total last-item">Action</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>
<?php 
$orderid=$_POST['orderid'];
$email=$_POST['email'];
$ret = mysqli_query($con,"select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.id='$orderid' and orders.paymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
					<td><?php echo $cnt;?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['pname'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
					<td class="cart-product-grand-total"><?php echo $qty*$price;?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
					
					<td>
 <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">
					Track</td>
				</tr>
<?php $cnt=$cnt+1;} } else { ?>
				<tr><td colspan="8">Either order id or  Registered email id is invalid</td></tr>
				<?php } ?>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</form>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo include('assets/includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php include('assets/includes/footer.php');?>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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