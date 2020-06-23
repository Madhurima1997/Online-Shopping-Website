<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="about.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header class="top-logo s12 s-12">
			<img src="logo.png" alt="Z shopping store" height="100px" width="100px">
			<h1>Z SHOPPING STORE</h1>
		</header>
		<div class="topnav s12 s-12" id="myTopnav">
			<a href="cloth.html" class="active">Clothes</a>
			<a href="shoe.html" class="active">Shoes</a>
			<a href="access.html">Accessories</a>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<!-- Header image -->
		<section>
			<img src="about-3.jpeg" alt="About_Us">
		</section>
		<!-- About us content -->
		<div class="about-body s-12 s12">
			<article class="about-text">
				<i>We aim on to keep changing the world, one dress at a time. Our goal is to make every experience just that; an experience, not just "shopping". Whether that's online or in store, we hope you enjoy the "Dress Up touch" while shopping with us.We offer new styles every now and then, make it affordable and on trend</i>
			<article>
			</br>
			<img src="about-2.jpg">
			<article class="about-text">
				<i>Z Shopping Store has one main mission - to show the love of Christ and to help women realize their worth. Our brand strives to make sure that each woman walking through the doors leaves feeling more confident and loved than they did walking in.</i>
			<article>
			</br>
			<img src="about-1.jpg">
		</div>
		</br>
		<!-- footer -->
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
		<!-- javascript for responsive dropdown navigation bar -->
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
	</body>
</html>