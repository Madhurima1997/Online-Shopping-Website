<!DOCTYPE html>
<?php include('server.php') ?>
<?php
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["item_id"] == $_GET["id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location="shopping.php"</script>';
		}
		}
	}
}
?>
<html>
<head>
	<meta charset="UTF-8">
		<!-- Responsive Page  -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="cart.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<title>My Cart</title>
</head>
<body>
	<div class="shopping-cart">
	<!-- Title -->
		<div class="title">
			Shopping Bag
		</div>
		<table class="table table-bordered">
		<tr>
		<th width="40%">Item Name</th>
		<th width="10%">Quantity</th>
		<th width="20%">Price</th>
		<th width="15%">Total</th>
		<th width="5%">Action</th>
		</tr>
		<?php
		if(!empty($_SESSION["shopping_cart"]))
		{
		$total = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<tr>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td>Rs. <?php echo $values["item_price"]; ?></td>
		<td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
		<td><a href="shopping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
		}
		?>
		<tr>
		<td colspan="3" align="right">Total</td>
		<td align="right">Rs. <?php echo number_format($total, 2); ?></td>
		<td></td>
		</tr>
		<?php
		}
		?>
		
		</table>	
		<Button class="bttn">Buy Now</Button> 
	</div>
</body>
</html>