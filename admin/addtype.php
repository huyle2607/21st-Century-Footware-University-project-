<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add brands</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/cssweb.css">
	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
  	<script>
  	$(function() {
    	$('#datepicker').datepicker({format: "yyyy-mm-dd"});
  	});
  	</script>
</head>
<body id="add-body" class="top">
<?php
include('../config/config.php');
ini_set('display_errors', 0);
$maloai = $_POST['typeid'];
$tenloai = $_POST['typename'];
if(isset($_POST['add']))
{
	$sqlinsert = "INSERT INTO loaisanpham VALUES ('$maloai','$tenloai')";
	$resultinsert = mysql_query($sqlinsert);
	if($resultinsert)
	{
		?>
		<script>
		alert('Add types successfully!');
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Add types failed!');
		</script>tui 
		<?php
	}
}
?>
	<div align="center" class="container">
		<form name="add-form" class="add-form" action="" method="POST" role="form">
			<legend align="center">Adding types</legend>
			<div class="form-group">
				<input name="typeid" type="text" class="form-control" id="typeid" placeholder="ID - for example: sh, ff, bt,etc" value="<?php $_POST['typeid'] ?>">
			</div>
			<div class="form-group">
				<input type="text" name="typename" id="typename" class="form-control" value="<?php  $_POST['typename']?>" placeholder="Type name">
			</div>
			<button name="add" type="submit" class="btn btn-primary">Add</button>
			<button name="Cancel" type="button" onclick="location.href='index.php'" class="btn btn-primary">Cancel</button>
		</form>
	</div>
</body>
</html>