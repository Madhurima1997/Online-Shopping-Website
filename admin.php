<?php include('server.php') ?>
<html>
	<head>
		<title>Admin Dashboard</title>
		<meta charset="UTF-8">
		<!-- Responsive Page  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="admin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script>
			let mainNavLinks = document.querySelectorAll("nav ul li a");
			let mainSections = document.querySelectorAll("main section");
			let lastId;
			let cur = [];
			window.addEventListener("scroll", event => {
			let fromTop = window.scrollY;
			mainNavLinks.forEach(link => {
				let section = document.querySelector(link.hash);
				if (
				section.offsetTop <= fromTop &&
				section.offsetTop + section.offsetHeight > fromTop
				) {
				link.classList.add("current");
				} else {
				link.classList.remove("current");
				}
			});
			});
		</script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['bar']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
				['Product', 'Sales'],
				['Clothing', 100],
				['Shoes', 70],
				['Accessories', 150]
				]);
				var options = {
				chart: {
					title: 'Sales Analytics',
					subtitle: 'Product Sales',
				},
				bars: 'horizontal' // Required for Material Bar Charts.
				};
				var chart = new google.charts.Bar(document.getElementById('barchart_material'));
				chart.draw(data, google.charts.Bar.convertOptions(options));
			}
    </script>
	</head>
	<body>
		<header class="top-logo s12 s-12">
			<img src="C:\Users\madhu\Documents\books n notes\vit sem2\web programming\jcomp\logo.png" alt="Z shopping store" height="100px" width="100px">
			<h1>Z SHOPPING STORE</h1>
			<a href="home.php?logout='1'">Logout</a>
		</header>
		
		<nav>
			<ul>
				<li><a href="#section-1">Dashboard</a></li>
				<li><a href="#section-2">User Address Details</a></li>
				<li><a href="#section-3">Update User Address</a></li>
				<li><a href="#section-4">Update User Contact</a></li>
			</ul>
		</nav>
		<div class="dash" id="section-1">
			<div class="user-container">
				<div class="box">
					<div class="icon">
						<?php
							$sql = "SELECT COUNT(uname) from user where uname<>'Admin'";
							$result = mysqli_query($db, $sql) or die ("Query error!");
							while ($row = mysqli_fetch_array($result)) {
								$var = $row['COUNT(uname)'];
							echo $var;
							}
						?>
					</div>
					<div class="content">
						<h2>Happy Registered Users </h2>
					</div>
				</div>
			</div>
			<div class="graph" id="barchart_material"></div>
			<div class="prod_mnth">
				<h2>Product of the Month</h2>
				<p>product name: product code</p>
			</div>
		</div>
		<div class="user_data" id="section-2">
			<h1>Customer Address Detail</h1>
			<form method="post" action="admin.php">
			Name: <input type="text" id="cid" placeholder="Enter Name" name="name">
			Contact name: <input type="text" id="cont" placeholder="Enter contact number" name="contact">
			<button type="submit" class="btn" name="search">Search Address!</button>
			</form>
				<?php
				$nm="";
				$cn="";
				if (isset($_POST['search'])) {
					$nm=mysqli_real_escape_string($db, $_POST['name']);
					$cn=mysqli_real_escape_string($db, $_POST['contact']);
					if (empty($nm)){
						$sql="SELECT uname,phone,hno,city,state FROM user Where phone='".$cn."'";
						$result = mysqli_query($db, $sql) or die ("Query error!");
					}
					elseif (empty($cn)){
						$sql="SELECT uname,phone,hno,city,state FROM user Where uname LIKE '".$nm."%'";
						$result = mysqli_query($db, $sql) or die ("Query error!");
					}
					else{
						$sql="SELECT uname,phone,hno,city,state FROM user Where uname LIKE '".$nm."%' AND phone='".$cn."'";
						$result = mysqli_query($db, $sql) or die ("Query error!");
					}
					if (mysqli_num_rows($result)>0){
						echo "<table border='1'>
								<tr>
								<th>Name</th>
								<th>Contact no</th>
								<th>Address</th>
								</tr>";
						while($row = mysqli_fetch_array($result)){
							 echo "<tr>";
							 echo "<td>" . $row['uname'] . "</td>";
							 echo "<td>" . $row['phone'] . "</td>";
							 echo "<td>" . $row['hno'] ." , ".$row['city']." , ".$row['state']. "</td>";
							 echo "</tr>
							 </table>";
						}
					}
					else
						echo "No results";
				}
				?>
		</div>
		<div class="user_data" id="section-3">
			<h1>Update Customer Address</h1>
			<form method="post" action="admin.php">
				User Id: <input type="text" placeholder="Enter ID" name="id">
				UserName: <input type="text" placeholder="Enter Name" name="uname">
				H.no:<input type="text" placeholder="Enter H.No" name="hno"></br></br>
				City:<input type="text" placeholder="Enter City" name="ct">
				State:<input type="text" placeholder="Enter State" name="st"></br></br>
				<button type="submit" class="btn" name="update1">Update Address!</button>
			</form>
			<?php
				$id="";
				$n="";
				$hno="";
				$ct="";
				$st="";
				if(isset($_POST['update1'])){
					$id=mysqli_real_escape_string($db, $_POST['id']);
					$n=mysqli_real_escape_string($db, $_POST['uname']);
					$hno=mysqli_real_escape_string($db, $_POST['hno']);
					$ct=mysqli_real_escape_string($db, $_POST['ct']);
					$st=mysqli_real_escape_string($db, $_POST['st']);
					$sql="UPDATE user SET hno='$hno',city='$ct',state='$st' WHERE u_id='$id' AND uname='$n'";
					$res=mysqli_query($db,$sql);
				}
			?>
		</div>
		<div class="user_data" id="section-4">
			<h1>Update Customer Contact</h1>
			<form method="post" action="admin.php">
				User Id: <input type="text" placeholder="Enter ID" name="i">
				UserName: <input type="text" placeholder="Enter Name" name="na">
				Contact: <input type="text" placeholder="Enter Contact.No" name="cno"></br></br>
				<button type="submit" class="btn" name="updatec">Update Contact!</button>
			</form>
			<?php
				$i="";
				$na="";
				$cno="";
				if(isset($_POST['updatec'])){
					$id=mysqli_real_escape_string($db, $_POST['i']);
					$n=mysqli_real_escape_string($db, $_POST['na']);
					$cno=mysqli_real_escape_string($db, $_POST['cno']);
					$sql1="UPDATE `user` SET `phone`='".$cno."' WHERE u_id='".$i."' AND uname='".$na."'";
					$res=mysqli_query($db,$sql1);
				}
			?>
		</div>
		
		<div class="end s12 s-12">
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
		</div>
	</body>
</html>