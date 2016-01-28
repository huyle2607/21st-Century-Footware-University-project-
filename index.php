<?php
session_start();
$url_host = 'http://localhost:8080/shoestore/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>21st Century Shoestore</title>
<base href="http://localhost:8080/shoestore/">
<link rel="stylesheet" type="text/css" href="css/index-style.css">
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery.sticky.js"></script>
</head>
<body>
<?php
include('config/config.php'); 
ini_set('display_errors', 0);
$act = $_GET['act'];
$shoeid = $_GET['shoeid'];
$brandid = $_GET['brandid'];
$searchkey = $_GET['searchkey'];
?>
<div id="wrapper">
  <div id="header">
    <div id="banner"></div>
    <!--Banner--> 
	    <?php 
      if(!$_SESSION['username'])
      {
      ?>
      <a href="<?php echo $url_host ?>Login.html"><img id="log-in" src="img/login.png" alt="log-in" title="Login"></a>
      <?php 
      }
      else
      {
        $sqluser = "SELECT makhachhang, hovatenlot, ten, machucvu FROM khachhang WHERE username='".$_SESSION['username']."' ";
        $resultuser = mysql_query($sqluser);
        $rowuser = mysql_fetch_array($resultuser);
        $machucvu = $rowuser['machucvu'];
        if($machucvu == 1)
        {
          echo '<div id="after-login">
                  <a href="admin/index.php"><h2 class="admin"><span>'.$rowuser['hovatenlot'].'&nbsp;'.$rowuser['ten'].'</span></h2></a><br>
                  <a class="logout" href="member/logout.php"><span>>> Logout <<</span></a>
                </div>';
        }
        else
        {
          echo '<div id="after-login">
                  <h2>'.$rowuser['hovatenlot'].'&nbsp;'.$rowuser['ten'].'</h2><br>
                  <a class="logout" href="member/logout.php"><span>>> Logout <<</span></a>
                </div>';
        }
      }
      ?>
      </div>
  <!--header-->
  <div id="menu" class="menu">
    <ul>
      <li><a href="<?php echo $url_host ?>">Home</a>
      	<ul>
      		<img id="home" src="img/home.png">
      	</ul>
      </li>
      <li> <a href="<?php echo $url_host ?>Shoes.html">Shoes</a>
        <ul>
          <img id="shoenav" src="img/shoenav.png">
          <?php
				$sqlhanggiay = "SELECT * FROM hangsanpham WHERE loai LIKE '%shoes%'";
				$resulthanggiay = mysql_query($sqlhanggiay);
				while($rowhang = mysql_fetch_array($resulthanggiay))
				{
				?>
          <a href="<?php echo $url_host ?>Brand/<?php echo $rowhang['tenhang'] ?>"><li> <?php echo $rowhang['tenhang']; ?> </li></a>
          <?php
				}
				?>
        </ul>
      </li>
      <li> <a href="<?php echo $url_host ?>Boots.html">Boots</a>
        <ul>
          <img id="bootnav" src="img/bootnav.png">
          <?php
				$sqlhangboot = "SELECT * FROM hangsanpham WHERE loai LIKE '%boots%'";
				$resulthangboot = mysql_query($sqlhangboot);
				while ($rowhang = mysql_fetch_array($resulthangboot)) 
				{
				?>
          <a href="<?php echo $url_host ?>Brand/<?php echo $rowhang['tenhang'] ?>"><li><?php echo $rowhang['tenhang'] ?></li></a>
          <?php
				}
		  ?>
        </ul>
      </li>
      <li> <a href="<?php echo $url_host ?>Flip-flops.html">Flip-flop</a>
        <ul>
          <img id="flipflopnav" src="img/flipflopnav.png">
          <?php
				$sqlhangflipflop = "SELECT * FROM hangsanpham WHERE loai='flipflopandshoes'";
				$resulthangflipflop = mysql_query($sqlhangflipflop);
				while ($rowhang = mysql_fetch_array($resulthangflipflop)) 
				{
				?>
          <a href="<?php echo $url_host ?>Brand/<?php echo $rowhang['tenhang'] ?>"><li><?php echo $rowhang['tenhang']; ?></li></a>
          <?php
				}
				?>
        </ul>
      </li>
    </ul>
    <form id="formsearch" name="formsearch" action="<?php echo $url_host ?>Search/<?php echo $_POST['searchkey'] ?>" method="post">
      <input type="image" src="img/searchicon_white.png" alt="Submit" id="searchicon" />
      <input id="searchtext" type="search" name="searchkey" placeholder="Search..." value="<?php echo $_POST['searchkey'] ?>" />
    </form><!--Search-->
  </div>
  <!--Menu-->
  <div id="content">
  <div id="content-top">
    <div id="cart"><?php include('cart/khunggiohang.php') ?></div>
    <div id="price-filter"><?php 
                            include('webcontent/price_filter.php');
                            ?></div>
  </div>
    <article id="main">
    	<?php include('webcontent/sankhau.php'); ?>
    </article>
    <!--Main--> 
  </div>
  <!--content-->
  <div class="footer">Copyright @ 2015 by HuyLe</div>
</div>
<!--wrapper-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/preloader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/preloader/main.js"></script>
</body>
</html>
