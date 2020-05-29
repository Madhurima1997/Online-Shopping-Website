<?php
	session_start();
	if(!isset($_SESSION['username'])){
		$_SESSION['msg']="You must log in";
		header('location:index.php');
	}
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header("location:index.php");
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Responsive Page  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="home.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
		<!-- Top Header for logo and signup links -->
			<div class="top_header">
				<img class="logo" src="logo.png" alt="Z shopping store" height="100px" width="100px">
				<h1 class="shop_name">Z SHOPPING STORE</h1>
				<nav class="log_sign">
					<ul>
						<?php if(isset($_SESSION['username'])): ?>
						<li class="lsr">Welcome <strong><?php echo $_SESSION['username']; ?></strong></li>
						<li><a href="home.php?logout='1'" class="lsr">Logout</a></li>
						<?php else: ?>
						<li><a href="index.php" class="lsr">Login</a></li>
						<li><a href="sign-up.php" class="lsr">Signup</a></li>
						<?php endif ?>
						<li><a href="account2updated.html" class="lsr2">Account</a></li>						
					</ul>			
				</nav>
			</div>
		</header>
		<!-- Navigation Bar -->
		<header class="next">
			<nav class="cat">
				<ul>
					<li><a href="cloth.php">Clothing</a></li>
					<li><a href="shoe.php">Shoes</a></li>
					<li><a href="access.php">Accessories</a></li>
				</ul>
			</nav>
			<div class="toggle-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</header>
		</br>
		<!-- Image Carousel -->
		<div class="slideshow-container">
			<div class="mySlides fade">
				<img src="sl1.jpg" style="width:100%">
			</div>
			<div class="mySlides fade">
				<img src="sl2.jpg" style="width:100%">
			</div>
			<div class="mySlides fade">
				<img src="sl3.jpg" style="width:100%">
			</div>
			<div class="mySlides fade">
				<img src="sl4.jpg" style="width:100%">
			</div>
		</div>
		<br>
		<div style="text-align:center">
			<span class="dot"></span> 
			<span class="dot"></span> 
			<span class="dot"></span> 
			<span class="dot"></span>
		</div>
		<!-- Flip links -->
		<div class="flips s-12 s12">
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
						<img src="link1.jpg" alt="Clothes" style="width:300px;height:300px;">
					</div>
					<div class="flip-card-back">
						<a class="page-link" href="#Clothes"></br>Buy new arrivals at amazing prices. Free shipping on purchase over 2000</a>
					</div>
				</div>
			</div>
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
						<img src="link2.jpg" alt="Shoes" style="width:300px;height:300px;">
					</div>
					<div class="flip-card-back">
						<a class="page-link" href="#Shoes"></br>Get the latest trends of footwear!</a>
					</div>
				</div>
			</div>
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front">
						<img src="link3.jpg" alt="Accessories" style="width:300px;height:300px;">
					</div>
					<div class="flip-card-back">
						<a class="page-link" href="#Accessories"></br>Flaunt your fashion by teaming up with the elegant accessories.</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer containing links -->
		<footer>
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
		</footer>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script>
			var slideIndex = 0;
			showSlides();
			function showSlides() {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				var dots = document.getElementsByClassName("dot");
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none";  
				}
				slideIndex++;
				if (slideIndex > slides.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";  
				dots[slideIndex-1].className += " active";
				setTimeout(showSlides, 2000); // Change image every 2 seconds
			}
		</script>
	</body>
</html>