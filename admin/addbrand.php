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
$mahang = '';
$tenhang = $_POST['brandname'];
$loai = $_POST['brandtype'];
if(isset($_POST['add']))
{
	$sqlinsert = "INSERT INTO hangsanpham VALUES ('$mahang','$tenhang', '$loai')";
	$resultinsert = mysql_query($sqlinsert);
	if($resultinsert)
	{
		?>
		<script>
		alert('Add brands successfully!');
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Add brands failed!');
		</script>
		<?php
	}
}
?>
	<div align="center" class="container">
		<form name="add-form" class="add-form" action="" method="POST" role="form">
			<legend align="center">Adding brands</legend>
			<div class="form-group">
				<input name="brandname" type="text" class="form-control" id="brandname" placeholder="Brand name" value="<?php $_POST['brandname'] ?>">
			</div>
			<div class="form-group">
			<select name="brandtype" id="brandtype" class="form-control" required="required">
				<option value="">Type</option>
				<option value="shoes">Shoes</option>
				<option value="boots">Boots</option>
				<option value="flipflop">Flip-flop</option>
				<option value="flipflopandshoes">Flip-flop and shoes</option>
				<option value="shoesandboots">Shoes and boots</option>
			</select>
			</div>
			<button name="add" type="submit" class="btn btn-primary">Add</button>
			<button name="Cancel" type="button" onclick="location.href='index.php'" class="btn btn-primary">Cancel</button>
		</form>
	</div>
</body>
</html>