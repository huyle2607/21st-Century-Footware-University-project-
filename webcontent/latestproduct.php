<!DOCTYPE html>
<html>
<head>
  <title>Latest product</title>
  <link rel="stylesheet" href="css/cssweb.css">
</head>
<body>
<?php
ini_set('display_errors', 0);
include ('config/config.php');
$sqlproduct = "SELECT masp, tensanpham, tenhang, tenloai, mota, concat(soluong, ' pairs' ) as soluong, concat(format(dongia,0), ' VND') as dongia 
, hinh, khongdau FROM sanpham, loaisanpham, hangsanpham WHERE sanpham.mahang = hangsanpham.mahang AND sanpham.maloai = loaisanpham.maloai ORDER BY ngaynhap DESC LIMIT 0,8 ";
$resultproduct = mysql_query($sqlproduct);
?>
<div style="border-bottom: dashed 1px rgba(0, 0, 0, 0.49)"><img class="latestproducts" src="img/latestproducts.jpg" alt="Latest products"></div>
<br>
<br>
<div id="row">
<?php
while ($rowproduct = mysql_fetch_array($resultproduct)) {
?>
<div id="sub-row" class="product">
 <img class="tag" src="img/latesttag.png" alt="Tag" width="60" height="35">
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
</body>
</html>