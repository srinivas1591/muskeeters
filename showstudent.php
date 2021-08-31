<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Profile</title>
</head>
<body>
	<?php 
		
		if(!isset($_GET['name']))
		{
			header('location:facultydashboard.php');
		}
		$name=$_GET['name'];
		$mystu=mysqli_query($database,"select * from users where username='$name'");
		$fet=mysqli_fetch_assoc($mystu);
	?>
	<center><br><br>
		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="images/profileicon.png" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $fet['username'];?></h5>
		    <p class="card-text">Role : <?php echo $fet['role'];?></p>
		    <p class="card-text">Branch : <?php echo $fet['branch'];?></p>
		    <a href="showstuds.php" class="btn btn-primary">Go back</a>
		  </div>
		</div>
	</center>
</body>
</html>
