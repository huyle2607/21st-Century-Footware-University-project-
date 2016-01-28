<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Order</title>
	<base href="http://localhost:8080/shoestore/cart/">

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/cart-site.css">
	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    <script>
    $(function() {
      $('#datepicker').datepicker({format: "yyyy-mm-dd"});
    });
    </script>
</head>
<body id="order-body">
<?php 
ini_set('display_errors', 0);
include('../config/config.php');
include('check_userlogin.php');
if($_POST['receiver'] == '')
{
	?>
	<script>
	alert("Please enter the Receiver's name please!");
	return false;
	</script>
	<?php
}
else
{
	//----SQL----
	$sql = "SELECT makhachhang, username FROM khachhang WHERE username = '".$_SESSION['username']."'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	//-----------
	$makh = $row['makhachhang'];
	$ngaydathang = date('Y-m-d');
	$ngaygiaohang = $_POST['date'];
	$diachi = $_POST['address'];
	$dienthoai = $_POST['tel'];
	$nguoinhan = $_POST['receiver'];
	//--------Order--------
	$sqlorder = "INSERT INTO donhang(makhachhang,ngaydathang,ngaygiaohang,diachigiaohang,nguoinhan,dienthoai) 
	VALUES('$makh','$ngaydathang','$ngaygiaohang','$diachi','$nguoinhan','$dienthoai')";
	$resultorder = mysql_query($sqlorder);
	if($resultorder)
	{
		$sql2 = "SELECT madonhang FROM donhang ORDER BY madonhang DESC";
		$result2 = mysql_query($sql2);
		$n2 = mysql_num_rows($result2);
		if($n2 > 0)
		{
			$row2 = mysql_fetch_array($result2);
			$madonhang = $row2['madonhang'];
			for($i = 1; $i <= $_SESSION['total']; $i++)
			{
				$sqlorderdetail = "INSERT INTO donhangchitiet(masp,soluong,dongia,size,madonhang) VALUES('".$_SESSION['productid'.$i]."','".$_SESSION['quantity'.$i]."','".$_SESSION['price'.$i]."','".$_SESSION['shoesize'.$i]."','$madonhang')";
				$resultorderdetail = mysql_query($sqlorderdetail);
			}
		}
	}
	$_SESSION['total'] = 0;
	echo '<script>
	      location.href = "ordercomplete.php";
		</script>';
}
?>
	<form name="order_form" id="order_form" action="" method="post" role="form">
		<legend>Please fill in these information!</legend>
	
		<div class="form-group margin">
			<input name="receiver" type="text" class="form-control" required="required" id="" placeholder="Receiver" value="<?php echo $_POST['receiver'] ?>">
		</div>
		<div class="form-group margin">
			<input name="tel" type="number" class="form-control" required  id="tel" placeholder="Tel" value="<?php echo $_POST['tel'] ?>">
		</div>
		<div class="form-group margin">
			<textarea name="address" id="addresss" class="form-control" rows="3" required="required" style="resize: none" placeholder="Address"><?php echo $_POST['address'] ?></textarea>
		</div>
		<div class="form-group margin">
			<input name="date" type="text" class="form-control" required="required" id="datepicker" placeholder="Received date" value="<?php echo $_POST['date'] ?>">
		</div>
		<div class="form-group button-bottom">
			<input type="submit" name="order" id="inputOrder" class="btn btn-primary" value="Order" required="required" pattern="" title="">
		</div>
	</form>
</body>
</html>