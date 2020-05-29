<?php include('server.php') ?>
<html>
    <head>
        <title>Account</title>
        <meta charset="UTF-8">
		<!-- Responsive Page  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="s1.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    </head>
    <body>
        <!-- Sidebar -->
        <div class="left">
            <div class="list-group sidebar">
                <ul>
                    <li><a href="#" class="list-group-item active"><i class="fa fa-user"></i>  <span>My Profile</span></a></li>
                    <li><a href="shopping.html" class="list-group-item"><i class="fa fa-shopping-cart"></i>  <span>My Cart</span></a></li>
                    <li><a href="home.php?logout='1'" class="list-group-item" > <i class="fa fa-sign-out"></i>  <span>Sign Out</span></a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <h1>My Profile</h1>
			<?php if(isset($_SESSION['username'])): ?>
			<?php
				$nm=$_SESSION['username'];
				$sql="SELECT * FROM user WHERE uname='$nm'";
				$result = mysqli_query($db, $sql);
				$user = mysqli_fetch_assoc($result);
			?>
            <div class="user-card">
                <div class="left">
                    <img src="avatar.png" width="100%">
                </div>
                <div class="right">
                    <h3><?php echo $_SESSION['username']; ?></h3>
                    <p><b>Email:</b><?php echo $user["email"]; ?></p>
                    <p><b>Phone:</b><?php echo $user["phone"]; ?></p>
                </div>
                <div class="magic"></div>
			<?php endif ?>
            </div>
            <br>
            <h1>Update Profile</h1>
            <div class="user-card">
                <form action="#" id="myform" onsubmit="return validation()">
                    <div class="form-area">
                        <input type="text" class="form-elements" placeholder="Name" id="name" value="" />
                    </div>
                    <div class="form-area">
                       
                        <input type="text" class="form-elements" placeholder="Email" id="eml" value="" />
                    </div>
                    <div class="form-area">
                        
                        <input type="text" class="form-elements" placeholder="Phone" id="pno" value="" />
                    </div>
                    <div class="form-area">
                        
                        <textarea class="form-textarea" placeholder="Address" rows="10" id="add" ></textarea>
                    </div>
                    <button type="submit" class="btn-custom" value="submit">Submit</button>
                </form>
            </div>
        </div>
        <script type="text/javascript">
        	function validation()
        	{
        		var x=document.getElementById("name").value;
        		if(x=="")
				{
					alert("Name is mandatory");
					document.getElementById("name").value="";
					return false;
				}
				else
				{
					if(x.match('[a-zA-Z ]*$')==false)
					{
						alert("Name must contain alphabets only");
						document.getElementById("nm").value="";
						return false;
					}
				}
				var email=document.getElementById("eml").value;
				if(email=="")
				{
					alert("Email is mandatory");
					document.getElementById("eml").value="";
					return false;
				}
				else
				{
					if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)==false)
					{
						alert("Invalid Email-Id");
						document.getElementById("eml").value="";
						return false;
					}
				}
				var phno=document.getElementById("pno").value;
				if(phno=="")
				{
					alert("Contact number is mandatory");
					document.getElementById("pno").value="";
					return false;
				}
				else
				{
					if (/^[0-9]{10}$/.test(phno)==false)
					{
						alert("Invalid Contact number");
						document.getElementById("pno").value="";
						return false;
					}
				}
        	}
        </script>
    </body>
</html>