<?php 
	include 'navbar.php';
	include 'database.php';
	if(!isset($_GET['testid']))
	{
		header('location:tests.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test Submissions</title>
</head>
<body>
		<?php 
			
			if(!isset($_SESSION['faculty']))
			{
				header('location:redirect.php');
			}
			$testid=$_GET['testid'];
			$classid=$_SESSION['classroom'];
			$a=mysqli_query($database,"select * from testsubs where testid='$testid' and classid='$classid'");
			echo '<center>';
			if(mysqli_num_rows($a)==0)
			{
				echo '<br><h6>No Submissions till now</h6>';
			}
			else
			{
				echo '<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Student</th>
					      <th scope="col">Marks</th>
					    </tr>
					  </thead>
					  <tbody>';
					   while($abc=mysqli_fetch_assoc($a))
					   {
						    echo '<tr>
						      <th scope="row">'.$abc['student'].'</th>
						      <td colspan="2">'.$abc['marks'].'</td>
						    </tr>';
						}
			echo '</tbody></table></center>';
			}
		?>
</body>
</html>
