<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Jaldi:700,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="js/slider/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="js/slider/jssor.js"></script>
    <script type="text/javascript" src="js/slider/jssor.slider.js"></script>
    <script type="text/javascript" src="js/slider/slider.js"></script>
	<title>Huyle's Footwear site</title>
</head>
<body>
<?php
include('config/config.php');
$sql_quangcao = "SELECT * FROM quangcao ORDER BY ngaynhap desc";
$result_quangcao = mysql_query($sql_quangcao);
?>
	<section class="cd-slider-wrapper">
		<ul class="cd-slider">
			<li class="visible">
				<div>
				<a href="index.php"><img class="logo" src="img/logo-white.png" width="106" height="108" title="Enter store"></a>
				</div>
			</li>
				
			<li>
				<div>
				<!-- Jssor Slider Begin -->
				    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
				    <div id="slider1_container">
				        <!-- Loading Screen -->
				        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
				                top: 0px; left: 0px; width: 100%; height: 100%;">
				            </div>
				            <div style="position: absolute; display: block; background: url(img/slider/loading.gif) no-repeat center center;
				                top: 0px; left: 0px; width: 100%; height: 100%;">
				            </div>
				        </div>
				        <!-- Slides Container -->
				        <div class="slides" u="slides">
				        <?php
				        while($row_quangcao = mysql_fetch_array($result_quangcao))
				        {
				        ?>
				            <div>
				                <img class="ad" u="image" src="img/productimages/ads/<?php echo $row_quangcao['hinh']?>" />
				                
				                <div class="thongdiepngan" style="color:<?php echo $row_quangcao['mau']; ?>"><?php echo $row_quangcao['thongdiepngan'] ?>
				                </div>
				                <div class="thongdiepdai" style="color: <?php echo $row_quangcao['mau'];?>">
				                        <?php echo $row_quangcao['thongdiepdai'] ?>
				                </div>
				            </div>
				        <?php
				         }
				        ?>
				        </div>
				        <!-- bullet navigator container -->
        					<!--Bullet navigator was deleted-->
        				<!--#endregion Bullet Navigator Skin End -->

				        <!-- Arrow Left -->
				        <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px;">
				        </span>
				        <!-- Arrow Right -->
				        <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
				        </span>
				        <!--#endregion Arrow Navigator Skin End -->
				    </div>
				<a href="index.php"><img class="logo-2" src="img/logo-white-original.png" width="74" height="77" title="Enter store"></a>
				</div><!--End page 2-->
			</li>

			<li>
				<div>
				<a href="index.php"><img class="logo-2" src="img/logo-white-original.png" width="74" height="77" title="Enter store"></a>
					<section class="page2">
					<h2>About</h2>
					<p style="font-size: 38px; font-family: Canter Light">This website was created by HuyLe.</p>
					<p style="font-size: 35px; font-family: Canter Light; margin-top: -15px">We serve all kinds of footwear including Shoes, sandals, boots, and flip-flop.</p>
					<p style="font-size: 32px; font-family: Canter Light">If you have any problems, please click on the Contact button below.</p>
					<img class="shoes1" src="img/productimages/airforcemid.png">
					<img class="shoes2" src="img/productimages/free.png">
					<img class="shoes4" src="img/productimages/ChuckTaylorAllStarJackPurcell.png">
					<img class="shoes3" src="img/productimages/ChuckTaylorAllStarBatman.png">
					</section>
				</div>
			</li>

			<li>
				<div>
				<a href="index.php"><img class="logo-2" src="img/logo-white-original.png" width="74" height="77" title="Enter store"></a>
				 <hgroup>
					<h2>Is there any problem?</h2>
					<p>If yes, you can contact us via our Facebook page or Google+ is okay too.</p>
					<div><a href="https://www.facebook.com/lehasonvanquochuy"><img id="fb" src="img/fb.png"></a><a href="https://plus.google.com/+HuyLe2607"><img id="gg" src="img/gg.png"></a></div>
				 </hgroup>
				</div>
			</li>
		</ul> <!-- .cd-slider -->
	
		<ol class="cd-slider-navigation">
			<li class="selected"><a href="#0"><em>Home</em></a></li>
			<li><a href="#0"><em>Service</em></a></li>
			<li><a href="#0"><em>About</em></a></li>
			<li><a href="#0"><em>Contact</em></a></li>
		</ol> <!-- .cd-slider-navigation -->
		
		<div class="cd-svg-cover" data-step1="M1402,800h-2V0.6c0-0.3,0-0.3,0-0.6h2v294V800z" data-step2="M1400,800H383L770.7,0.6c0.2-0.3,0.5-0.6,0.9-0.6H1400v294V800z" data-step3="M1400,800H0V0.6C0,0.4,0,0.3,0,0h1400v294V800z" data-step4="M615,800H0V0.6C0,0.4,0,0.3,0,0h615L393,312L615,800z" data-step5="M0,800h-2V0.6C-2,0.4-2,0.3-2,0h2v312V800z" data-step6="M-2,800h2L0,0.6C0,0.3,0,0.3,0,0l-2,0v294V800z" data-step7="M0,800h1017L629.3,0.6c-0.2-0.3-0.5-0.6-0.9-0.6L0,0l0,294L0,800z" data-step8="M0,800h1400V0.6c0-0.2,0-0.3,0-0.6L0,0l0,294L0,800z" data-step9="M785,800h615V0.6c0-0.2,0-0.3,0-0.6L785,0l222,312L785,800z" data-step10="M1400,800h2V0.6c0-0.2,0-0.3,0-0.6l-2,0v312V800z">
			<svg height='100%' width="100%" preserveAspectRatio="none" viewBox="0 0 1400 800">
				<title>SVG cover layer</title>
				<desc>an animated layer to switch from one slide to the next one</desc>
				<path id="cd-changing-path" d="M1402,800h-2V0.6c0-0.3,0-0.3,0-0.6h2v294V800z"/>
			</svg>
		</div> <!-- .cd-svg-cover -->
	</section> <!-- .cd-slider-wrapper -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/snap.svg-min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>