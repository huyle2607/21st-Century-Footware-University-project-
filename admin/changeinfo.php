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
$Masp = $_GET['Productid'];
include('../config/config.php');
ini_set('display_errors', 0);
$masp = $_POST['productid'];
$tensanpham = $_POST['productname'];
$hangsanpham = $_POST['brand'];
$loaisanpham = $_POST['type'];
$mota = $_POST['detail'];
$soluong = $_POST['quantity'];
$dongia = $_POST['price'];
$image = $_FILES['image']['name'];
$ngaynhap = $_POST['date'];

$sql = "SELECT * FROM sanpham WHERE masp='$Masp'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
//.....Sửa.....
if(isset($_POST['save']))
{
	if($image!="")
	{
	$sqlupdate = "UPDATE sanpham SET masp='$masp',tensanpham='$tensanpham',mahang='$hangsanpham',maloai='$loaisanpham',mota='$mota',soluong='$soluong',dongia='$dongia',hinh='$image',ngaynhap='$ngaynhap' WHERE masp='$Masp'";
	}
	else
	{
		$sqlupdate = "UPDATE sanpham SET masp='$masp',tensanpham='$tensanpham',mahang='$hangsanpham',maloai='$loaisanpham',mota='$mota',soluong='$soluong',dongia='$dongia',ngaynhap='$ngaynhap' WHERE masp='$Masp'";
	}
	$resultupdate = mysql_query($sqlupdate);	
	move_uploaded_file($_FILES['image']['tmp_name'],"../img/productimages/".$_FILES['image']['name']);
	if($resultupdate)
	{
		?>
        <script>
		alert('Changed successfully!');
		location.href='index.php';
		</script>
        <?php
		
	}
	else
	{
		?>
        <script>
		alert('Change product failed!');
		</script>
        <?php
	}
}
?>
	<div align="center" class="container">
		<form name="change-form" class="change-form" enctype="multipart/form-data" action="" method="POST" role="form">
			<legend align="center">Changing product info</legend>
		
			<div class="form-group">
				<input type="text" class="form-control" id="id" name="id" value="<?php echo $Masp ?>" readonly>
			</div>
			<div class="form-group">
				<input name="productname" type="text" class="form-control" id="productname" placeholder="Product name" value="<?php echo $row['tensanpham']; ?>">
			</div>
			<div class="form-group">
			<select name="brand" id="input" class="form-control" required="required">
				<option value="">Brand</option>
				<?php
				$sqlbrand = "SELECT mahang, tenhang FROM hangsanpham";
				$resultbrand = mysql_query($sqlbrand);
				while ($rowbrand = mysql_fetch_array($resultbrand)) 
				{
					if($row['mahang'] == $rowbrand['mahang'])
					{
							?>
							<option value="<?php echo $rowbrand['mahang'] ?>" selected><?php echo $rowbrand['tenhang'] ?></option>
							<?php
						}
						else
						{
							?>
							<option value="<?php echo $rowbrand['mahang'] ?>"><?php echo $rowbrand['tenhang'] ?></option>
							<?php
						}
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
					if($row['maloai'] == $rowtype['maloai'])
					{
						?>
						<option value="<?php echo $rowtype['maloai'] ?>" selected><?php echo $rowtype['tenloai'] ?></option>
						<?php
					}
					else
					{
					?>
						<option value="<?php echo $rowtype['maloai'] ?>"><?php echo $rowtype['tenloai'] ?></option>
					<?php
					}
				}
				?>
			</select>
			</div>
			<div class="form-group">
				<textarea name="detail" id="input" class="form-control" style="resize: none;" rows="3" required="required" placeholder="Detail"><?php echo $row['mota'] ?></textarea>
			</div>
			<div class="form-group">
				<input placeholder="Quantity" type="number" name="quantity" id="quantity" class="form-control" min="10" max="1000" step="" required="required" title="Quantity" value="<?php echo $row['soluong']; ?>">
			</div>
			<div class="form-group">
				<input type="number" name="price" id="price" class="form-control" min="" max="" step="" required="required" placeholder="Price/pairs" value="<?php echo $row['dongia']; ?>">
			</div>
			<div class="form-group">
				<img name="imagedemo" src="../img/productimages/<?php echo $row['hinh'] ?>" class="img-responsive" alt="Image" width="150px" height="150px">
			</div>
			<div class="input-group form-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input name="image" id="image" type="file" multiple>
                    </span>
                </span>
                <input type="text" class="form-control" value="<?php echo $row['hinh'] ?>" readonly>
            </div>
			<div class="form-group">
                      <input type="text" name="date" id="datepicker" class="form-control" placeholder="Date" value="<?php echo $row['ngaynhap'] ?>">
                    </div>
			<button name="save" type="submit" class="btn btn-primary">Save</button>
			<button name="Cancel" type="button" class="btn btn-primary" onclick="location.href='index.php'">Cancel</button>
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