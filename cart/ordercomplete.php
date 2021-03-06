<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="7;url=../index.php" />
	<title>Order completed!</title>
	<style type="text/css" media="screen">
		.complete {
			font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
			text-align: center;
			margin-top: 220px;
		}

		h1, h2, h3 {
			font-weight: 200;
		}

		h1 {
			font-size: 60px;
		}

		h2 {
			font-size: 30px;
			margin-top: -20px;
		}
	</style>
	<script type="text/javascript">
		var count=7;
		var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
		function timer()
		{
		  count=count-1;
		  if (count <= 0)
		  {
		     clearInterval(counter);
		     return;
		  }

		  document.getElementById("timer").innerHTML="This page will be redirected after "+ count + " secs"; 
		}
	</script>
</head>
<body>
	<div class="complete">
		<h1>Order completed!</h1>
		<h2>Thank you for using our store!</h2>
		<span id="timer"></span>
	</div>
</body>
</html>