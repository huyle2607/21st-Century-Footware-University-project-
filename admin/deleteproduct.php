<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include('../config/config.php');
$productid = $_GET['productid'];
$sqldelete = "DELETE FROM sanpham WHERE masp='$productid'";
$resultdelete = mysql_query($sqldelete);
if($resultdelete)
{
	?>
    <script>
	alert('Deleted successfully!');
	location.href='index.php';
	</script>
    <?php	
}
?>