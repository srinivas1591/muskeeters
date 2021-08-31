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
	<title>Register Page</title>
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
					<button id="b1">Register Here</button>
						<form name="f" method="POST" action="reg.php" onsubmit="return validate();">
							<input type="text" name="a" placeholder="username"><br>
							<input type="text" name="b" placeholder="password"><br>
							<select name="c">
								<option>Faculty</option>
								<option>Student</option>
							</select><br>
							<select name="d">
								<option>ece</option>
								<option>cse</option>
								<option>mech</option>
								<option>civil</option>
							</select><br>
							<input type="submit"  id="b4" value="Continue">
						</form>
						<font style="color:white">Already User ? <a href="index.php" style="color:white">CLick here</a></font>
				</div>
			</center>
		</div>
	</div>

	<script type="text/javascript">
	window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
	</script>


</body>
</html>