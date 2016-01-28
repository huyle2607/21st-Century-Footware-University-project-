<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Test session</title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
	.img-with-text {
    text-align: center;
    width: 100px;
    height: 100px;
    margin: 0px;
    right: 0px;
    left: 0px;
    float: left;
}

.img-with-text img {
    display: block;
    margin: 0 auto;
}	
p {
	width: 100px;
	}
	</style>
</head>
<body>
<?php
include('../config/config.php');
ini_set('display_errors', 0);
?>
	<div class="img-with-text">
		<img src="../img/admin.png" alt="">
		<p>Admin</p>
	</div>
</body>
</html>