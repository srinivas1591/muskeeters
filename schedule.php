<?php 
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Schedule class</title>
	<link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
	<?php 
		if(!isset($_SESSION['classroom']))
		{
			header('location:redirect.php');
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
	<center>
	<p>
	<?php
		if(isset($_SESSION['faculty']))
		{
			echo '<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
	    Schedule Class
	  </a>';
		}
	  ?>
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
	   Scheduled Classes (click me)
	  </button>
	</p>
	<?php
		if(isset($_SESSION['faculty']))
		{
			echo '<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			  	<h4>Schedule new Class</h4>
			    <form action="calback.php" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Faculty</label>
				    <input type="text" class="form-control" name="fac" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Faculty">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Date</label>
				    <input type="date" class="form-control" name="g" id="exampleInputPassword1" placeholder="Date">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Start Time</label>
				    <input type="time" class="form-control" name="d" id="exampleInputPassword1" placeholder="Date">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">End Time</label>
				    <input type="time" class="form-control" name="e" id="exampleInputPassword1" placeholder="Date">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Link</label>
				    <input type="text" class="form-control" name="f" id="exampleInputPassword1" placeholder="link">
				  </div>
				  <button type="submit" class="btn btn-primary">Continue</button>
				</form>
			  </div>
			</div>';
		}
	?>
	<div class="collapse" id="collapseExample2">
	  <div class="card card-body">
	  	<h4>Scheduled Classes</h4>
	  	<div class="card">
		  <div class="card-header">
		    Live
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from calander where classid='$classid' and status='live'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Live Classes</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">Faculty</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Time</th>
							      <th scope="col">Link</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['lecturer'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].'</td>
						      <td>'.$fe['start'].' - '.$fe['end'].'</td>
						      <td><a href="'.$fe['link'].'" target="_blank">Click Here</a></td>
						    </tr>';
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>


		  <div class="card-header">
		    Upcoming
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from calander where classid='$classid' and status='yettostart'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Upcoming Classes</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">Faculty</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Time</th>
							      <th scope="col">Link</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['lecturer'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].'</td>
						      <td>'.$fe['start'].' - '.$fe['end'].'</td>
						      <td><a href="'.$fe['link'].'" target="_blank">Click Here</a></td>
						    </tr>';
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>


		  <div class="card-header">
		    Completed
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from calander where classid='$classid' and status='completed'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Completed Classes</blockquote>';
			    	}
			    	else
			    	{

			    		echo '<thead>
							    <tr>
							      <th scope="col">Faculty</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Time</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['lecturer'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].'</td>
						      <td>'.$fe['start'].' - '.$fe['end'].'</td>
						    </tr>';
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
	</center>
</body>
</html>
