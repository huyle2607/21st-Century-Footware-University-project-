<!DOCTYPE html>
<html>
<head>
  <title>Brand product</title>
  <link rel="stylesheet" href="css/cssweb.css">
</head>
<body>
<?php
ini_set('display_errors', 0);
include ('config/config.php');
$brandid= $_GET['brandid'];
$sqlproduct = "SELECT masp, tensanpham, tenhang, mota, concat(soluong, ' pairs' ) as soluong, concat(format(dongia,0), ' VND') as dongia 
, hinh, khongdau FROM sanpham, hangsanpham WHERE sanpham.mahang = hangsanpham.mahang AND tenhang = '$brandid'";
$resultproduct = mysql_query($sqlproduct);
$sodong = 8;
$sodulieu = mysql_num_rows($resultproduct);
$sotrang = ceil($sodulieu / $sodong);
if (!$_GET['p']) $p = 1;
else $p = $_GET['p'];
$x = ($p - 1) * $sodong;
$sqlproduct1 = "SELECT masp, tensanpham, tenhang, mota, concat(soluong, ' pairs' ) as soluong, concat(format(dongia,0), ' VND') as dongia 
, hinh, khongdau FROM sanpham, hangsanpham WHERE sanpham.mahang = hangsanpham.mahang AND tenhang = '$brandid' LIMIT $x,$sodong";
$resultproduct1 = mysql_query($sqlproduct1) or die(mysql_error());
?>
<div id="row">
<?php
while ($rowproduct = mysql_fetch_array($resultproduct1)) {
?>
<div id="sub-row" class="product">
  <a href="<?php echo $url_host ?>Detail/<?php echo $rowproduct['khongdau'] ?>.html"><img src="img/productimages/<?php
    echo $rowproduct['hinh'] ?>" width="200px" height="auto" style="margin-left: 25px" /></a>
  <p align="center"><?php
    echo $rowproduct['tensanpham'] ?></p>
  <p align="center" style="color: #dc0000; font-weight: bold"><?php
    echo $rowproduct['dongia'] ?></p>
</div>
<?php
}
?>
</div><!--Row-->
<div align="center">
  <font style="font-weight: bold" size="4">Page <?php if(!$_GET['p']) {echo 1;} else {echo $_GET['p'];} ?></font>
  <div class="pagination">
  <?php
    for ($i = 1; $i <= $sotrang; $i++) {
  ?>
  <a href="<?php echo $url_host ?>brand/<?php echo $brandid ?>/page-<?php echo $i ?>"><?php echo $i; ?></a>
  <?php 
  }
  ?>
</body>
</html>