<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Product detail</title>
	<link rel="stylesheet" href="css/cssweb.css">
	<script src="js/check.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<?php
$shoeid = $_GET['shoeid'];
$size = $_POST['shoesize'];
$quantity = $_POST['quantity'];
include('config/config.php');
$sqldetail = "SELECT masp, tensanpham, mota, concat(format(dongia,0)) as dongia, hinh, khongdau FROM sanpham
			  WHERE khongdau = '$shoeid'";
$resultdetail = mysql_query($sqldetail);
$rowdetail = mysql_fetch_array($resultdetail);
?>
<div class="container-productdetail">
	<form action="<?php echo $url_host ?>Cart.html/<?php echo $rowdetail['masp'] ?>" method="POST" name="detail_form">
	<img class="productimage" src="img/productimages/<?php echo $rowdetail['hinh'] ?>" alt="<?php $rowdetail['tensanpham']; ?>"
	title="<?php echo $rowdetail['tensanpham'] ?>">
	<div class="side-bar">
		<h2 style="border: solid 1px #6f7c8a; padding: 7px 10px"><?php echo $rowdetail['tensanpham']; ?></h2>
		<p style="font-weight: 200; color: #6f7c8a; margin: 0px;"><font color="#000">Details:  </font><?php echo $rowdetail['mota'] ?></p>
		<font size="4" color="#6f7c8a">Size: </font><select name="shoesize" id="shoesize" style="width: 75px; height: 30px; margin-top: 45px; margin-left:0px" required>
			<option selected> </option>
			<?php 
			for($i=32; $i <= 45; $i++)
			{
				?>
				<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php
			}
			 ?>
		</select>
		<h4 style="color: #dc0000; margin-top: 25px;">Price: <?php echo $rowdetail['dongia'] ?> &#8363;</h4>
		<input class="cart" src="img/shoppingcart.png" type="image" name="addtocart">	
	</div>	
	</form><!--FORM-->
</div>
</body>
</html>