<!DOCTYPE html>
<html>
<head>
  <title>Price sort</title>
  <link rel="stylesheet" href="css/cssweb.css">
</head>
<body>
<?php
ini_set('display_errors', 0);
include ('../config/config.php');
$sorttype = $_REQUEST['sorttype'];
switch ($sorttype) {
  case 'lowesttohighest':
    $sqlsort = "SELECT * FROM sanpham ORDER BY dongia ASC";
    break;
  default:
    $sqlsort = "SELECT * FROM sanpham ORDER BY dongia desc";
    break;
}
$resultsort = mysql_query($sqlsort);
$sodong = 8;
$sodulieu = mysql_num_rows($resultsort);
$sotrang = ceil($sodulieu / $sodong);
if (!$_GET['p']) $p = 1;
else $p = $_GET['p'];
$x = ($p - 1) * $sodong;
//--------SQL 2-----------
switch ($sorttype) {
  case 'lowesttohighest':
    $sqlsort1 = "SELECT * FROM sanpham ORDER BY dongia ASC LIMIT $x, $sodong";
    break;
  default:
    $sqlsort1 = "SELECT * FROM sanpham ORDER BY dongia desc LIMIT $x, $sodong";
    break;
}
$resultsort1 = mysql_query($sqlsort1);
?>
<div style="text-align: center; font-size: 35px; margin-top: 40px; margin-bottom: 20px; border: solid 1px #6f7c8a; width: 800px; margin-left: 175px;"><?php echo $tb ?></div>
<div id="row">
<?php
while ($rowsort = mysql_fetch_array($resultsort1)) {
?>
<div id="sub-row" class="product">
  <a href="index.php?shoeid=<?php echo $rowsort['masp'] ?>"><img src="img/productimages/<?php
    echo $rowsort['hinh'] ?>" width="200px" height="auto" style="margin-left: 25px" /></a>
  <p align="center"><?php
    echo $rowsort['tensanpham'] ?></p>
  <p align="center" style="color: #dc0000; font-weight: bold"><?php
    echo number_format($rowsort['dongia'], 0, ',', '.') ?> đ</p>
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
  <a href="<?php echo $url_host ?>price-sort/type-<?php echo $sorttype ?>/page-<?php echo $i ?>"><?php echo $i; ?></a>
  <?php 
  }
  ?>
</body>
</html>