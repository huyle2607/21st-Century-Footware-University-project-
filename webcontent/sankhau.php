<?php 
$act = $_GET['act'];
$shoeid = $_GET['shoeid'];
$brandid = $_GET['brandid'];
$productid = $_GET['productid'];
$searchkey = $_GET['searchkey'];
if ($act == "" && $shoeid == "" && $brandid == "" && $searchkey == "") 
include('latestproduct.php');
else if($brandid)
include('brandproduct.php');
else if($shoeid)
include('productdetail.php');
else if($searchkey)
include('webcontent/search.php');
else if($act==home)
include('home.php');
else if($act==cart)
include('cart/cart.php');
else if($act==pricesort)
include('webcontent/pricesort.php');
else if($act==sh || $act==bt || $act==ff)
include('webcontent/typeproduct.php');
else
include('ordercomplete.php');

?>