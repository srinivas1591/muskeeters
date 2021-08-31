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
<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="subjectnavstyle.css">
	<meta charset="utf-8">
	<title>Dashboard</title>
</head>
<body>
	<div class="nav">
		<div class="logo" ><img src="images/burgericon.png" id="menu" onclick="sidebartoggle();"><header>Online Class</header></div>


			<nav>
			<ul class="nav_links">
				<li><a href="#" name="n" class="active"> Assigments</a></li>
				<li><a href="#" name="n" class=""> Tests</a></li>
				<li><a href="#" name="n" class=""> Calender</a></li>
			</ul>
			</nav>
		<div class="profile">
	<img src="images/profileicon.png"><span>	<a href="profile.php" style="text-decoration: none;color: black;"><?php echo $username;?></a></span></div>
	</div>
		
	<div class="sidebar" id="sidebar">
		<a href="#"><div class="item highlight">Subject 1</div></a>
		<a href="#"><div class="item">Subject 2</div></a>
		<a href="#"><div class="item">Subject 3</div></a>
		<a href="#"><div class="item">Subject 4</div></a>
		<a href="#"><div class="item">Subject 5</div></a>
		<a href="#"><div class="item">Subject 6</div></a>
	</div>
</body>
<script type="text/javascript">
	var items=document.getElementsByName('n')
	for (var i = 0; i < items.length; i++) {
  items[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace("");
  this.className = "active";
  });
}

	var sidebaritems=document.getElementsByClassName('item')
	for (var i = 0; i < sidebaritems.length; i++) {
  sidebaritems[i].addEventListener("click", function() {
  var current = document.getElementsByClassName(" highlight");
  current[0].className = current[0].className.replace("highlight"," ");
  this.className += " highlight";
  });
}

function sidebartoggle() {
	var sidebar=document.getElementById('sidebar');
	sidebar.classList.toggle("active");
}
</script>
</html>