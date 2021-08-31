<?php
	session_start();
	if(isset($_SESSION['faculty']))
	{
		header('location:adminpanel.php');
	}
	if(isset($_SESSION['student']))
	{
		header('location:staffpanel.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="index.js"></script>
</head>
<body>
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?>
	<div id="warning"></div>
	<div id="maincontainer">
		<div id="container1">
			<center>
				<p>The Flipr Hackathon</p>
				<h3>Team Muskeeters</h3>
			</center>
		</div>
		<div id="container 2">
			<center>
				<div class="form">
					<button id="b1" onclick="b1();">Student Login</button>
					<button id="b2" onclick="b2();">Faculty Login</button>
						<form name="f" method="POST" action="login.php" onsubmit="return validate();">
							<input type="text" name="a" placeholder="username"><br>
							<input type="password" name="b" placeholder="password"><br>
							<input type="submit" name="c" id="b4" value="Faculty Login">
							<input type="submit" name="d" id="b5" value="Student Login">
						</form>
						<font style="color:white">New User ? <a href="register.php" style="color:white">CLick here</a></font>
				</div>
			</center>
		</div>
	</div>

	<script type="text/javascript">
	window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
	</script>


</body>
</html>