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
	
	<center><br><br>
		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="images/profileicon.png" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $username;?></h5>
		    <p class="card-text">Role : <?php echo $role;?></p>
		    <p class="card-text">Branch : <?php echo $b['branch'];?></p>
		    <a href="logout.php" class="btn btn-primary">Logout</a>
		  </div>
		</div>
	</center>
</body>
</html>
