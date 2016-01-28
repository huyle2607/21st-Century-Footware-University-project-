<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shopping cart</title>
	<link rel="stylesheet" type="text/css" href="css/cart-site.css">
</head>
<body>
<?php 
$productid = $_GET['productid'];
$size = $_REQUEST['shoesize'];
include('config/config.php');
ini_set('display_errors', 0);
$kt = 0;
for($i = 1; $i <= $_SESSION['total']; $i++)
{
	if($_GET['productid'] == $_SESSION['productid'.$i])
	{
		if($size == $_SESSION['shoesize'.$i])
		{
			$kt = 1;
			$_SESSION['quantity'.$i]++;
			break;
		}		
	}
}

if($kt==0)
{
	$sql = "SELECT * FROM sanpham WHERE masp='$productid'";
	$result = mysql_query($sql);
	$n = mysql_num_rows($result);
	if($n > 0)
	{
		$row = mysql_fetch_array($result);
		$_SESSION['total']++;
		$j = $_SESSION['total'];
		$_SESSION['productid'.$j] = $row['masp'];
		$_SESSION['productname'.$j] = $row['tensanpham'];
		$_SESSION['price'.$j] = $row['dongia'];
		$_SESSION['shoesize'.$j] = $size;
		$_SESSION['quantity'.$j] = 1;
	}
}
?>
<div class="wrapper">
	<form action="cart/update_cart.php" method="post" accept-charset="utf-8">
<h1>Here is your cart</h1>
<table class="item-table">
  <tr>
  	<th class="header">No</th>
    <th class="header" style="width:40%">Product's name</th>
    <th class="header">Size</th>
    <th class="header">Quantity</th>
    <th class="header">Price</th>
    <th class="header">Total cost</th>
    <th class="header">Delete</th>
  </tr>
  <?php
  for ($i = 1; $i <= $_SESSION['total'];$i++)
  {
  ?>
  <tr>
  	<td class="td"><?php echo $i ?></td>
    <td class="td" id="productname"><?php echo $_SESSION['productname'.$i] ?></td>
    <td class="td"><?php echo $_SESSION['shoesize'.$i] ?></td>
    <td class="td">
    	<input id="quantity" style="text-align: center" type="number" min="1" max="120" name="C<?php echo $i ?>" value="<?php echo $_SESSION['quantity'.$i] ?>" placeholder="Quantity">
    </td>
    <td class="td"><?php echo number_format($_SESSION['price'.$i],0,',','.' )?> &#8363;</td>
    <td class="td"><font color="#dc0000" style="font-weight: bold"><?php echo number_format($_SESSION['quantity'.$i]*$_SESSION['price'.$i],0,',','.')?> &#8363;</font></td>
    <td class="td"><input id="delete" type="checkbox" name="X<?php echo $i ?>"></td>
  </tr>
  <?php
	}
  ?>
</table>
<?php
	  function tongtien()
  {
	  $s = 0;
	  for($i = 1; $i <= $_SESSION['total'];$i++)
	  {
		  $s = $s + $_SESSION['quantity'.$i]*$_SESSION['price'.$i];
		  
	  }
	return $s;  
}
?>
<div class="sum-up">
	Total: <?php echo number_format(tongtien(),0, ',','.') ?> &#8363;
</div>
<div class="button-left">
	<input id="update" type="image" src="img/update.png" name="update" value="update" placeholder="update" width="45" heigth="45" title="Update">
	<input id="delete" type="image" src="img/delete2.png" name="delete" value="delete" placeholder="delete" width="45" heigth="45" title="Delete">
</div>
<div class="button-middle">
	<input id="order" type="button" class="button-order" name="order" value="Order" placeholder="order" width="45" heigth="45" title="Order"
	onclick="location.href='<?php echo $url_host ?>Order'">
</div>
</form>
</div><!-- wrapper -->
</body>
</html>