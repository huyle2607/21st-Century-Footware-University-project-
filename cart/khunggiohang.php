<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cart</title>
	<link rel="stylesheet" href="css/cart.css">
</head>
<body>
<?php 
function totalItems()
{
	$sl = 0;
	for ($i = 1; $i <= $_SESSION['total']; $i++ )
	{
		$sl = $sl + $_SESSION['quantity'.$i];
	}
	return $sl;
}
?>
	<table>
	<tr>
		<td><a href="<?php echo $url_host ?>Your-cart.html"><img class="cart-img" src="img/shoppingbag.png" alt="Shopping bag" title="Shopping bag" width="60" height="60"></a></td>
		<td>You have <b><?php echo totalItems(); ?></b> item(s) in your cart</td>
	</tr>	
	</table>
</body>
</html>