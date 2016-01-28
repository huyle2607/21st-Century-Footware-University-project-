<?php
session_start();
include_once('../config/config.php');
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$sqlchecklogin = "SELECT * FROM khachhang WHERE username = '$username'";
$resultchecklogin = mysql_query($sqlchecklogin) or die(mysql_error());
$rowchecklogin = mysql_fetch_array($resultchecklogin);
$macv = $rowchecklogin['machucvu'];
if(!$username||$macv==0)
{
	?>
	<script type="text/javascript">
	alert("Wait a minute! You haven't logined yet!");
	location.href = "../member/login.php";
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/quantriindex.css">
</head>	
<body>
<?php 
include_once('../config/config.php');
ini_set('display_errors', 0);
$sql = "SELECT hovatenlot, ten FROM khachhang WHERE username= '".$_SESSION['username']."'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
//--------Products SQL---------
$sqlproduct = "SELECT * FROM sanpham";
$resultproduct = mysql_query($sqlproduct);
?>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<a class="navbar-brand" href="../home.php"><img class="logo" src="../img/logo.jpg"></a>
		<ul class="nav navbar-nav">
			<li>
				<a href="../index.php">Home</a>
			</li>
		</ul>
		<div class="nav navbar-nav right">
			<h3>Hello <?php echo $row['hovatenlot'].' '.$row[ten]; ?></h3>
		</div>
	</nav>
	<div class="col-lg-2 col-1">
		<ul class="side-bar">
			<li><a href="addproduct.php">Add product</a></li>
			<li><a href="addbrand.php">Add brand</a></li>
			<li><a href="addtype.php">Add type</a></li>
			<li><a href="logout-admin.php">Log out</a></li>
		</ul>
		<img src="../img/logo2.jpg" alt="" width="200px" height="200px" style="margin-left: -7px;">
	</div>
	<div class="col-lg-10 col-2">
		<table class="table table-hover">
			<thead style="text-align: center">
				<tr>
					<th>No</th>
					<th>Image</th>
					<th>Name</th>
					<th>Detail</th>
					<th width="150">Quantity</th>
					<th width="150">Price</th>
					<th width="150">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			while($rowproduct = mysql_fetch_array($resultproduct))
			{
				
			?>
				<tr>
					<td><?php echo $i ?></td>
					<td><img src="../img/productimages/<?php echo $rowproduct['hinh'] ?>" alt="Footwear" width="100" height="auto" title="<?php echo $rowproduct['tensanpham'] ?>"></td>
					<td><?php echo $rowproduct['tensanpham'] ?></td>
					<td><?php echo $rowproduct['mota'] ?></td>
					<td><?php echo $rowproduct['soluong'] ?></td>
					<td><font color="#dc0000" style="font-weight: bold"><?php echo number_format($rowproduct['dongia'],0,',','.') ?> &#8363;</font></td>
					<td>
						<a href="changeinfo.php?Productid=<?php echo $rowproduct['masp'] ?>"><img src="../img/change.png" alt="Change" title="Change" width="40" height="40"></a>
						&nbsp;&nbsp;
						<a href="deleteproduct.php?productid=<?php echo $rowproduct['masp'] ?>"><img src="../img/delete.png" alt="Delete" title="Delete" width="40" height="40"></a>
					</td>
				</tr>
			<?php
			$i++;
			}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>