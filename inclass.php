<?php 
include 'navbar.php';
	if(!isset($_GET['classid']))
	{
		header('location:redirect.php');
	}
	$classid=$_GET['classid'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Classroom</title>
</head>
<body>
	<?php
		
		$_SESSION['classroom']=$classid;
	?>
	<?php 
		$s=mysqli_query($database,"select * from classrooms where classid='$classid'");
		$ss=mysqli_fetch_assoc($s);
		$coun=mysqli_query($database,"select count(*) from students where classid='$classid'");
		$fc=mysqli_num_rows($coun);
		echo '<div class="card">
				  <div class="card-header"><h3 class="card-title">'.$ss['classname'].'</h3>created on :'.$ss['createdat'].' 
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Subject : '.$ss['subject'].'</h5>
				    <h5 class="card-title">Class Id : '.$ss['classid'].'</h5>
				    <p class="card-text">Created By : '.$ss['createdby'].'</p>
				    <a href="showstuds.php"><button type="button" class="btn btn-primary">
					  Students <span class="badge bg-secondary">'.$fc.'</span>
					</button></a>
				  </div>
				</div>';
	?>
	<br>
	<center>
				<a href="assignment.php"><button class="btn btn-success">Assignments</button></a>
				<a href="tests.php"><button class="btn btn-success">Tests</button></a>
				<a href="schedule.php"><button class="btn btn-success">Schedule Classes</button></a>
	</center>		
</body>
</html>
