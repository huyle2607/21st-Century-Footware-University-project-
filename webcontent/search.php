<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <link rel="stylesheet" href="css/cssweb.css">
</head>
<body>
<?php
ini_set('display_errors', 0);
include ('config/config.php');
$searchkey= $_GET['searchkey'];
$sqlsearch = "SELECT masp, tensanpham, mota, concat(soluong, ' pairs' ) as soluong, concat(format(dongia,0), ' VND') as dongia 
, hinh, khongdau FROM sanpham WHERE tensanpham LIKE '%$searchkey%'";
$resultsearch = mysql_query($sqlsearch);
$sodong = 8;
$sodulieu = mysql_num_rows($resultsearch);
$sotrang = ceil($sodulieu / $sodong);
if (!$_GET['p']) $p = 1;
else $p = $_GET['p'];
$x = ($p - 1) * $sodong;
$sqlsearch1 = "SELECT masp, tensanpham, mota, concat(soluong, ' pairs' ) as soluong, concat(format(dongia,0), ' VND') as dongia 
, hinh FROM sanpham WHERE tensanpham LIKE '%$searchkey%' LIMIT $x,$sodong";
$resultsearch1 = mysql_query($sqlsearch1);
$n = mysql_num_rows($resultsearch1);
if ($n > 0)
{
  $tb = '- Here is your results -';
}
else
{
  $tb = 'There is no result for "'.$searchkey.'". We are sorry about that.';
}
?>
<?php include('preloader.php'); ?>
<div style="text-align: center; font-size: 35px; margin-top: 40px; margin-bottom: 20px; border: solid 1px #6f7c8a; width: 800px; margin-left: 175px;"><?php echo $tb ?></div>
<div id="row">
<?php
while ($rowsearch = mysql_fetch_array($resultsearch1)) {
?>
<div id="sub-row" class="product">
  <a href="index.php?shoeid=<?php echo $rowsearch['masp'] ?>"><img src="img/productimages/<?php
    echo $rowsearch['hinh'] ?>" width="200px" height="auto" style="margin-left: 25px" /></a>
  <p align="center"><?php
    echo $rowsearch['tensanpham'] ?></p>
  <p align="center"><?php
    echo $rowsearch['dongia'] ?></p>
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
  <a class="current" href="<?php echo $url_host?>search/<?php echo $searchkey ?>/page-<?php
        echo $i ?>"><?php echo $i; ?></a>
  <?php 
  }
  ?>
</body>
</html>