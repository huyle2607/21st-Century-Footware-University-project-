<?php
session_start();
include('../config/config.php');
$sql = "SELECT username FROM khachhang WHERE username='".$_SESSION['username']."'";
$result = mysql_query($sql);
if($result)
{
	//huy session
	session_destroy();
	?>
    <script>
	location.href='../index.php';
	</script>
    <?php
}

?>