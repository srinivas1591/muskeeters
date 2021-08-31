<?php 
	session_start();
	include 'database.php';
	if(!isset($_SESSION['student']) && !isset($_SESSION['faculty']))
	{
		header('location:index.php');
	}
	if(isset($_SESSION['student']))
	{
		$username=$_SESSION['student'];
		$role="Student";
		$a=mysqli_query($database,"select * from users where username='$username' and role='Student'");
	}
	if(isset($_SESSION['faculty']))
	{
		$username=$_SESSION['faculty'];
		$role="Faculty";
		$a=mysqli_query($database,"select * from users where username='$username' and role='Faculty'");
	}
	$b=mysqli_fetch_assoc($a);
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="subjectnavstyle.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="navbar.css">


<div class="nav">
		<div class="logo" ><img src="images/burgericon.png" id="menu" onclick="sidebartoggle();"><header><a href="redirect.php" style="text-decoration:none;color: black;">Online Class</a></header></div>
		<div class="profile">
		<img src="images/profileicon.png"><span><a href="profile.php" style="text-decoration:none;color: black;"><?php echo $username; ?></a></span></div>
	</div>
		
</html>