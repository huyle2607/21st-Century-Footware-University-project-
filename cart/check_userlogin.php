<?php
session_start();
?>
<?php
include('../config/config.php');
ini_set("display_errors", 0);
if(!$_SESSION['username'])
{
	?>
    <script>
	alert("Wait a minute! You haven't logined yet!");
	location.href = '../member/login.php';
	</script>
    <?php
		
}

?>
