<?php 
	include 'navbar.php';
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test Submissions</title>
</head>
<body>
		<?php 
			
			if(!isset($_SESSION['classroom']))
			{
				header('location:facultydashboard.php');
			}
			if(!isset($_SESSION['faculty']))
			{
				header('location:redirect.php');
			}
			$classid=$_SESSION['classroom'];
			$a=mysqli_query($database,"select * from students where classid='$classid'");
			echo '<center>';
			if(mysqli_num_rows($a)==0)
			{
				echo '<br><h6>No Students till now</h6>';
			}
			else
			{
				echo '<table class="table">
					  <tbody>';
					   while($abc=mysqli_fetch_assoc($a))
					   {
						    echo '<tr>
						      <th scope="row"><a href="showstudent.php?name='.$abc['student'].'">'.$abc['student'].'</a></th>
						    </tr>';
						}
			echo '</tbody></table></center>';
			}
		?>
</body>
</html>
