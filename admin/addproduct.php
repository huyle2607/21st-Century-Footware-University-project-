<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add products</title>
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
<body id="add-body">
<?php
include('../config/config.php');
ini_set('display_errors', 0);
$masp = $_POST['id'];
$tensanpham = $_POST['productname'];
$hangsanpham = $_POST['brand'];
$loaisanpham = $_POST['type'];
$mota = $_POST['detail'];
$soluong = $_POST['quantity'];
$dongia = $_POST['price'];
$image = $_FILES['image']['name'];
$ngaynhap = $_POST['date'];

if(isset($_POST['add']))
{
	$sqlinsert = "INSERT INTO sanpham VALUES('$masp', '$tensanpham', '$hangsanpham', '$loaisanpham', '$mota', '$soluong', '$dongia', '$image', '$ngaynhap')";
	$resultinsert = mysql_query($sqlinsert);
	move_uploaded_file($_FILES['image']['tmp_name'],"../img/productimages/".$_FILES['image']['name']);
	if($resultinsert)
	{
		?>
		<script>
		alert('Add product successfully!');
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Add product failed!');
		</script>
		<?php
	}
}
?>
	<div align="center" class="container">
		<form name="add-form" class="add-form" enctype="multipart/form-data" action="" method="POST" role="form">
			<legend align="center">Adding products</legend>
		
			<div class="form-group">
				<input type="text" class="form-control" id="id" name="id" placeholder="ID" value="<?php echo $_POST['id'] ?>">
			</div>
			<div class="form-group">
				<input name="productname" type="text" class="form-control" id="productname" placeholder="Product name" value="<?php $_POST['productname'] ?>">
			</div>
			<div class="form-group">
			<select name="brand" id="input" class="form-control" required="required">
				<option value="">Brand</option>
				<?php
				$sqlbrand = "SELECT mahang, tenhang FROM hangsanpham";
				$resultbrand = mysql_query($sqlbrand);
				while ($rowbrand = mysql_fetch_array($resultbrand)) 
				{
				?>
				<option value="<?php echo $rowbrand['mahang'] ?>"><?php echo $rowbrand['tenhang'] ?></option>
				<?php
				}
				?>
			</select>
			</div>
			<div class="form-group">
			<select name="type" id="input" class="form-control" required="required">
				<option value="">Type</option>
				<?php
				$sqltype = "SELECT maloai, tenloai FROM loaisanpham";
				$resulttype = mysql_query($sqltype);
				while($rowtype = mysql_fetch_array($resulttype))
				{
					?>
					<option value="<?php echo $rowtype['maloai'] ?>"><?php echo $rowtype['tenloai'] ?></option>
					<?php
				}
				?>
			</select>
			</div>
			<div class="form-group">
				<textarea name="detail" id="input" class="form-control" style="resize: none;" rows="3" required="required" placeholder="Detail"><?php $_POST['detail'] ?></textarea>
			</div>
			<div class="form-group">
				<input placeholder="Quantity" type="number" name="quantity" id="quantity" class="form-control" value="" min="10" max="1000" step="" required="required" title="Quantity" value="<?php $_POST['quantity'] ?>">
			</div>
			<div class="form-group">
				<input type="number" name="price" id="price" class="form-control" value="" min="" max="" step="" required="required" placeholder="Price/pairs" value="<?php $_POST['price'] ?>">
			</div>
			<div class="input-group form-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input name="image" id="image" type="file" multiple>
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
			<div class="form-group">
                      <input type="text" name="date" id="datepicker" class="form-control" placeholder="Date" value="<?php $_POST['date'] ?>">
                    </div>
			<button name="add" type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	<script type="text/javascript" charset="utf-8" async defer>
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
</script>
</body>
</html>