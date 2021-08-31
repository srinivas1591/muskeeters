<?php 
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="homestyle.css">
	<title>Homepage</title>
</head>
<body>
	<br>
	<center>
		<a href="join.php"><button class="btn btn-success">Join Class <b>+</b></button></a>
	</center>

	<h4 style="margin-left: 15px;">My Classes</h4>
		<?php 
			$s=mysqli_query($database,"select * from classrooms,students where students.student='$username' and classrooms.classid=students.classid");
			while($ss=mysqli_fetch_assoc($s))
			{
				echo '<div class="card">
				  <div class="card-header"><h3 class="card-title">'.$ss['classname'].'</h3>created on :'.$ss['createdat'].' 
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Subject : '.$ss['subject'].'</h5>
				    <h5 class="card-title">Class Id : '.$ss['classid'].'</h5>
				    <p class="card-text">-'.$ss['createdby'].'</p>
				    <a href="inclassstudents.php?classid='.$ss['classid'].'" class="btn btn-primary">Go to Classroom</a>
				  </div>
				</div><br><br>';
			}

		?>
</body>
</html>
