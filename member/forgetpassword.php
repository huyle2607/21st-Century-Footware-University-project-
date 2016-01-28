<!DOCTYPE html>
<html>
<head>
	<title>Forget password</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/forgetpass.css">
</head>
<body>
<?php
ini_set('display_errors',0);
include('../config/config.php');
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		if($_POST['username'] == "")
		{
			?>
            <script>
			alert('You MUST enter username.');
			location.href = "forgetpassword.php";
			</script>
            <?php
		}
		else
		{
			$sql = "SELECT * FROM khachhang WHERE username='$username'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row[0] != 0)
			{
				$mkmoi = mt_rand();
				$mkmoimahoa = sha1((md5(md5($mkmoi))));
				$to = $row['email'];
				$from = "Shoestore's adminstrator";
				$sub = 'Renew password';
				$mes = 'Your new password is '.$mkmoi;
				$header = 'utf-8'.'From: '.$from.'\r\n';
				mail($to, $sub, $mes, $header);
				$sqlupdate = "UPDATE khachhang SET password = '$mkmoimahoa', xacnhanmatkhau = '$mkmoimahoa' WHERE username = '$username'";
				$resultupdate = mysql_query($sqlupdate);
				if($resultupdate)
				{
					?>
                    <script>
					alert('Renew your password successfully!');
					location.href = "login.php";
					</script>
                    <?php
				}
				else
				{
				  ?>
				  <script>
				  alert('Username is incorrect!');
				  </script>
				  <?php
				}
			}
			else
			{
			  ?>
			  <script>
			  alert('This username does not exist!');
			  </script>
			  <?php
			}
		}
	}
?>
	<div class="container">
		<form class="forgetpass_form" action="" method="POST" role="form">
			<legend>Let we get back your password!</legend>
		
			<div class="form-group">
				<input type="text" class="form-control" id="username" name="username" placeholder="Please enter username">
			</div>
			<button type="submit" class="btn btn-primary button-middle">Submit</button>
		</form>
	</div>
</body>
</html>