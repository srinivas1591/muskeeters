<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Join Classroom</title>
</head>
<body>
	<?php 
		
    	$fet=mysqli_query($database,"select * from users where username='$username' and role='Student'");
    	$fetc=mysqli_fetch_assoc($fet);
    	$branch=$fetc['branch'];
	?>
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?>
	<br>

	<div class="card">
	  <div class="card-header">
	    Classrooms in <?php echo $branch; ?> branch
	  </div>
	  <div class="card-body">
	   		<table class="table">
			  	<?php 
			  		$get=mysqli_query($database,"select * from classrooms where branch='$branch'");
			    	if(mysqli_num_rows($get)==0)
			    	{
			    		echo '<blockquote class="blockquote mb-0">No Classes available right now</blockquote>';
			    	}
			    	else
			    	{
			    		echo '<thead>
							    <tr>
							      <th scope="col">Classid</th>
							      <th scope="col">Subject</th>
							      <th scope="col">Created By</th>
							      <th scope="col">Created on</th>
							      <th scope="col">Join Link</th>
							    </tr>
							  </thead>
							  <tbody>';
				    	while($fe=mysqli_fetch_assoc($get))
				    	{
				    		$cls=$fe['classid'];
				    		$chk=mysqli_query($database,"select * from students where classid='$cls' and student='$username'");
				    		if(mysqli_num_rows($chk)==0)
				    		{
					    		echo 
					    		'<tr>
							      <td>'.$fe['classid'].'</td>
							      <td>'.$fe['subject'].'</td>
							      <td>'.$fe['createdby'].'</td>
							      <td>'.$fe['createdat'].'</td>
							      <td><a href="joinback.php?classid='.$fe['classid'].'"><button class="btn btn-success">Join</button></a></td>
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
