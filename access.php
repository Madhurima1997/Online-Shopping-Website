<?php include('server.php') ?>
<?php
	if(isset($_POST["add_to_cart"]))
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$item_array_id=array_column($_SESSION["shopping_cart"], "item_id");
			if(!in_array($_GET["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
					'item_id'		=>	$_GET["id"],
					'item_name'		=>	$_POST["hidden_name"],
					'item_price'		=>	$_POST["hidden_price"],
					'item_quantity'		=>	$_POST["quantity"]
				);
				$_SESSION["shopping_cart"][$count] = $item_array;
			}
			else
			{
				echo '<script>alert("Item Already Added")</script>';
			}
		}
		else
		{
			$item_array = array(
				'item_id'		=>	$_GET["id"],
				'item_name'		=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][0] = $item_array;
		}
		echo count($_SESSION["shopping_cart"]);
	}
	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Responsive Page  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="access.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script>
			function myFunction() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
					x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
		</script>
	</head>
	<body>
		<header class="top-logo s12 s-12">
			<img src="logo.png" alt="Z shopping store" height="100px" width="100px">
			<h1>Z SHOPPING STORE</h1>
			<a href="account2updated.php" class="lsr2">My Account</a>
		</header>
		<!-- Navigation bar-->
		<div class="topnav" id="myTopnav">
			<a href="home.php">Home</a>
			<a href="cloth.php">Clothes</a>
			<a href="shoe.php">Shoes</a>
			<a href="#access" class="active">Accessories</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="cloth-banner">
			<img src="access.png" alt="cloth banner">
		</div>
		<div class="main">
			<ul class="product-grid">
			<?php
			$sql="SELECT * FROM product WHERE cat='acc' ORDER BY p_id";
			$res=mysqli_query($db,$sql);
			if(mysqli_num_rows($res)>0){
				while($row=mysqli_fetch_array($res)){
			?>
				<li class="prod">
				<form method="post" action="access.php?action=add&id=<?php echo $row["p_id"]; ?>"> 
					<img src="<?php echo $row["pimg"]; ?>" alt="ac1" class="pic">
					<div class="desc">
						<?php echo $row["pname"]; ?></br>
							<?php echo $row["price"]; ?></br>
							Quantity <input type="text" name="quantity" value="1">
						<label id="show"></label></br></br>
						<input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>" /> 
						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
						<input type="submit" name="add_to_cart" id="b" value="Add to Cart">
					</div>
				</form>
				</li>
			<?php
				}
			}
			?>	
			</ul>
		</div>
		<section class="end s12 s-12">
			<div class="foot-logo">
				<img src="logo.png" alt="Z shopping store footer logo" height="50px" width="50px">
				<h3>Z Shopping Store</h3>
			</div>
			<article class="link-list">
				<ul>
					<li><a href="about.html" class="divi">About</a></li>
					<li><a href="contact.html" class="divi">Contact Us</a></li>
					<li><a href="privacy.html" class="no-divi">Privacy Policy</a></li>
				</ul>
			</article>
			<article class="copyr">
				&copy 2020 ZShopping Store
			</article>
		</section>
	</body>
</html>