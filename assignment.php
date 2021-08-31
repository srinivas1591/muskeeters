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
			header('location:studentassignments.php');
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
	    Upload Assignments
	  </a>
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
	   Student Submissions
	  </button>
	</p></center><div class="collapse" id="collapseExample"><div class="card">
			  <div class="card-header">
			    Upload New Assignment
			  </div>
			  <div class="card-body">
			  	<form method="post" action="backassign.php" enctype="multipart/form-data">
			  		<div class="form-group">
					    <label for="exampleInputEmail1">Deadline Date</label>
					    <input type="date" class="form-control" name="date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Deadline">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Deadline Time</label>
					    <input type="time" class="form-control" name="time" id="exampleInputPassword1" placeholder="Deadline">
					  </div>
				    <div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
					  </div>
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputGroupFile01"
					      aria-describedby="inputGroupFileAddon01" name="pdf_file" accept="application/pdf">
					    <label class="custom-file-label" for="inputGroupFile01">format : assignmentnumber.pdf(pdf only)</label>
					  </div>
					</div><br>
					<button type="submit" class="btn btn-primary">Continue</button>
				</form>
			  </div>
			</div></div>
	<div class="collapse" id="collapseExample2">
	  <div class="card card-body">
	  	<h4>Student Submission</h4>
	  	<div class="card">
		  <div class="card-header">
		    Live
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$fet=mysqli_query($database,"select * from assignments where classid='$classid' and status='live'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Live Classes</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">AssignmentId</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Status</th>
							      <th scope="col">File</th>
							      <th scope="col">Submissions</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['assignmentid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' '.$fe['deadline'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="uploads/pdf/'.$fe['file'].'" target="_blank">Click Here</a></td>
						      <td><a href="studsubs.php?assign='.$fe['assignmentid'].'"><button class="btn btn-success">Submissions</button></a></td>
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
			    	$fet=mysqli_query($database,"select * from assignments where classid='$classid' and status='completed'");
			    	if(mysqli_num_rows($fet)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Live Classes</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">AssignmentId</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Status</th>
							      <th scope="col">File</th>
							      <th scope="col">Submissions</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		echo 
				    		'<tr>
						      <td>'.$fe['assignmentid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' '.$fe['deadline'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="uploads/pdf/'.$fe['file'].'" target="_blank">Click Here</a></td>
						      <td><a href="studsubs.php?assign='.$fe['assignmentid'].'"><button class="btn btn-success">Submissions</button></a></td>
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
