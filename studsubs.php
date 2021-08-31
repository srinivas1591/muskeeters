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
		
		if(!isset($_GET['assign']))
		{
			header('location:assignment.php');
		}
		$asid=$_GET['assign'];
		$classid=$_SESSION['classroom'];
		$fetch=mysqli_query($database,"select *  from submissions where assignmentid='$asid' and classid='$classid'");
		$count=mysqli_num_rows($fetch);

	?>
	<br>
	<h6 style="margin-left: 15px;">Total Submissions (<?php echo $count; ?>)</h6>
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Student Name</th>
		      <th scope="col">Submission</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php 

			while($ss=mysqli_fetch_assoc($fetch))
			{
				echo 
				'<tr>
			      <td>'.$ss['student'].'</td>
			      <td><a href="uploads/pdf/'.$ss['file'].'" target="_blank"><button class="btn btn-success">Show File</button></a></td>
			    </tr>';
			}

		?>
		  </tbody>
	</table>
		
</body>
</html>
