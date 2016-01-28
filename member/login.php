<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<base href="http://localhost:8080/shoestore/member/">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/login.css">
	<script type="text/javascript" src="../js/login.js"></script>
	<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

</head>
<body>
<?php 
ini_set('display_errors', 0);
include('../config/config.php');
if(isset($_POST['username'])&&isset($_POST['password']))
{
	//$user = addslashes($_POST['user']);
	//$pass = addslashes(sha1(md5(md5($_POST['pass']))));
	
	$username = mysql_escape_string($_POST['username']);
	$password =  mysql_escape_string(sha1(md5(md5($_POST['password']))));
	$sql = "SELECT username, password FROM khachhang WHERE username='$username' and password ='$password'";
	
	$result = mysql_query($sql);
	$n = mysql_num_rows($result);
	if($n > 0)
	{
		//khi dùng $_SESSION ta phải khai báo session_start() ở đầu trang web
		$_SESSION['username']=$username;
		?>
        <script>
		alert('Login successfully!');
		location.href='../index.php';
		</script>
        <?php
		
	}
	else
	{
		?>
        <script>
		alert('Login failed!');
		</script>
        <?php
	}
	
}

?>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $_POST['username'] ?>">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $_POST['password'] ?>">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    	    <div style="text-align: center; margin-bottom: 10px; border-radius: 6px; border: dotted 1px #272727; width: 200px; margin-left: 65px">
			    	    	<a href="signup.php">Hey, I'm a new customer.</a><br>
			    	    	<a href="forgetpassword.php">I forgot my password.</a>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>