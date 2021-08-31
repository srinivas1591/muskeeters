<?php 
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Assignments</title>
</head>
<body>
	<?php  
		
		if(isset($_SESSION['student']))
		{
			header('location:studenttests.php');
		}
	?>
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?>

	<br>

	<center><p><a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
	    Upload Test
	  </a>
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
	   Student Submissions
	  </button>
	</p></center><div class="collapse" id="collapseExample"><div class="card">
			  <div class="card-header">
			    Upload New Test
			  </div>
			  <div class="card-body">
			  	<form method="post" action="bactest.php" enctype="multipart/form-data">
			  		<div class="form-group">
					    <label for="exampleInputPassword1">Test Name</label>
					    <input type="text" class="form-control" name="tname" id="exampleInputPassword1" placeholder="Testname">
					  </div>
			  		<div class="form-group">
					    <label for="exampleInputEmail1">Deadline Date</label>
					    <input type="date" class="form-control" name="date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Deadline">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Deadline Time</label>
					    <input type="time" class="form-control" name="time" id="exampleInputPassword1" placeholder="Deadline">
					  </div>
				    <br>
					<button type="submit" class="btn btn-primary">Continue</button>
				</form>
			  </div>
			</div></div>
	<div class="collapse" id="collapseExample2">
	  <div class="card card-body">
	  	<h4>Student Submissions</h4>
	  	<div class="card">
		  <div class="card-header">
		    Live
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from tests where classid='$classid' and status='live'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Tests here</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">TestId</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Deadline</th>
							      <th scope="col">Status</th>
							      <th scope="col">Submissions</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['testid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' - '.$fe['time'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="testsubb.php?testid='.$fe['testid'].'" target="_blank"><button class="btn btn-success">Click Here</button></a></td>
						    </tr>';
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>
		</div>

		<div class="card">
		  <div class="card-header">
		    Completed
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from tests where classid='$classid' and status='completed'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Tests Here</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">TestId</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Deadline</th>
							      <th scope="col">Status</th>
							      <th scope="col">Submissions</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['testid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' - '.$fe['time'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="testsubb.php?testid='.$fe['testid'].'" target="_blank"><button class="btn btn-success">Click Here</button></a></td>
						    </tr>';
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</body>
</html>
