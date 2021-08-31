<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Submissions</title>
</head>
<body>
	
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?><br>

	<div class="card">
		  <div class="card-header">
		    Live Assignments
		  </div>
		  <div class="card-body">
		  	<table class="table">
			  	<?php 
			    	$classid=$_SESSION['classroom'];
			    	$det=mysqli_query($database,"select * from assignments where classid='$classid' and status='live'");
			    	if(mysqli_num_rows($det)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Live Assignments</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">AssignmentId</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Date</th>
							      <th scope="col">Status</th>
							      <th scope="col">Assignment</th>
							      <th scope="col">Submitted/Not</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($det))
				    	{
				    		$asid=$fe['assignmentid'];
				    		$dchk=mysqli_query($database,"select * from submissions where classid='$classid' and assignmentid='$asid' and student='$username'");
				    		$ccc=mysqli_num_rows($dchk);
				    		echo 
				    		'<tr>
						      <td>'.$fe['assignmentid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' '.$fe['deadline'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="uploads/pdf/'.$fe['file'].'" target="_blank">Click Here</a></td>';
						      if($ccc)
						      {
						      	$abcd=mysqli_fetch_assoc($dchk);
						      	echo '<td><a href="uploads/pdf/'.$abcd['file'].'" target="_blank"><button class="btn btn-success">yes(show file)</button></a></td></tr>';
						      }
						      else
						      {
						      	echo '<td><a href="studsubnow.php?assign='.$fe['assignmentid'].'"><button class="btn btn-danger">submit here</button></a></td>
						    	</tr>';
							  }
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>
		</div><br>

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
							      <th scope="col">Submitted/Not</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($fet))
				    	{
				    		$asid=$fe['assignmentid'];
				    		$dchk=mysqli_query($database,"select * from submissions where classid='$classid' and assignmentid='$asid' and student='$username'");
				    		$ccc=mysqli_num_rows($dchk);
				    		echo 
				    		'<tr>
						      <td>'.$fe['assignmentid'].'</td>
						      <td>'.$fe['subject'].'</td>
						      <td>'.$fe['date'].' '.$fe['deadline'].'</td>
						      <td>'.$fe['status'].'</td>
						      <td><a href="uploads/pdf/'.$fe['file'].'" target="_blank">Click Here</a></td>';
						      if($ccc)
						      {
						      	$abcd=mysqli_fetch_assoc($dchk);
						      	echo '<td><a href="uploads/pdf/'.$abcd['file'].'" target="_blank"><button class="btn btn-success">yes(show file)</button></a></td></tr>';
						      }
						      else{
						     echo '<td><button class="btn btn-success">Not submitted</button></td>
						    </tr>';
							}
				    	}
				    }
			    ?>
		     </tbody>
			</table>
		  </div>
		</div>

</body>
</html>
