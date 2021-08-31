<?php include 'navbar.php'  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="classroom.css">
	<link rel="stylesheet" type="text/css" href="navbar.css">
	<meta charset="utf-8">
	<title>Create Classroom</title>
</head>
<body>
	
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?>
	<div class="container">
	<div class="title">
		Create Class
	</div>
	<div class="form">
	<form action="classroomback.php" method="post" onsubmit="return validate();" name="f">
		<div class="form-group">
				    <label for="exampleInputEmail1">Classname</label>
				    <input type="text" class="form-control" name="classname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="classname">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Subject</label>
				    <input type="text" class="form-control" name="subject" id="exampleInputPassword1" placeholder="subject">
				  </div>
				  <button type="submit" class="btn btn-primary">Continue</button>
	</form>
</body>
</html>
