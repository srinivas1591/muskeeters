<?php 
	include 'navbar.php';
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Tests</title>
</head>
<body>
	<br>
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
							      <th scope="col">Submitted/Not</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		$testid=$fe['testid'];
				    		$tri=mysqli_query($database,"select * from testsubs where classid='$classid' and testid='$testid' and student='$username'");
				    		$ftri=mysqli_fetch_assoc($tri);
				    		$cq=mysqli_num_rows($tri);
				    		echo 
				    		'<tr>
						      <td>'.$fe['testid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' - '.$fe['time'].'</td>
						      <td>'.$fe['status'].'</td>';
						      if($cq)
						      {
						      		echo ' <td><button class="btn btn-success">Submitted got '.$ftri['marks'].' marks</button></td>
						    </tr>';
						      }
						      else
						      {
						      echo '<td><a href="testsubs.php?testid='.$fe['testid'].'" target="_blank"><button class="btn btn-danger">Take Test</button></a></td>
						    </tr>';
						}
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
							      <th scope="col">Submitted/Not</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		$testid=$fe['testid'];
				    		$tri=mysqli_query($database,"select * from testsubs where classid='$classid' and testid='$testid' and student='$username'");
				    		$cq=mysqli_num_rows($tri);
				    		$ftri=mysqli_fetch_assoc($tri);
				    		echo 
				    		'<tr>
						      <td>'.$fe['testid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' - '.$fe['time'].'</td>
						      <td>'.$fe['status'].'</td>';
						      if($cq)
						      {
						      		echo ' <td><button class="btn btn-success">Submitted got '.$ftri['marks'].' marks</button></td>
						    </tr>';
						      }
						      else
						      {
						      echo '<td><button class="btn btn-danger">Not Submitted</button></td>
						    </tr>';
						}
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
