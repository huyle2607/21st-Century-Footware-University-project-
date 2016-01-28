<?php
session_start();
include('../config/config.php');
ini_set("display_errors", 0);
if($_POST['delete']=="")
{
	for($i = 1; $i <= $_SESSION['total']; $i++)
	{
		$_SESSION['quantity'.$i]= $_POST['C'.$i];
		
	}
	
}
else
{
	for($k = $_SESSION['total'];$k>=1; $k--)
	{
		if($_POST['X'.$k]=='on')
		{	
		for($i =$k;$i <= $_SESSION["total"];$i++)
		{
		$j = $i +1;
		$_SESSION["productid".$i]=$_SESSION["productid".$j];
		$_SESSION["productname".$i]=$_SESSION["productname".$j];
		$_SESSION["quantity".$i]=$_SESSION["quantity".$j];
		$_SESSION["price".$i]=$_SESSION["price".$j];
			
		}
		
		$_SESSION['total']--;
		}
		
	}
}
echo "<script>
location.href='../index.php?act=cart';
</script>";
?>
