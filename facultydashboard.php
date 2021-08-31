<?php include 'navbar.php';?>
<!DOCTYPE html>
<html>
<head>
		
	<title>Dashboard</title>
</head>
<body>
	
		


		<br>
		<center><a href="classroomform.php"><button class="btn btn-success">Create New Classroom <b>+</b></button></a></center><br>

		<?php 
			$s=mysqli_query($database,"select * from classrooms where createdby='$username'");
			while($ss=mysqli_fetch_assoc($s))
			{
				
				echo '<div class="card">
				  <div class="card-header"><h3 class="card-title">'.$ss['classname'].'</h3>created on :'.$ss['createdat'].' 
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Subject : '.$ss['subject'].'</h5>
				    <h5 class="card-title">Class Id : '.$ss['classid'].'</h5>
				    <p class="card-text">-'.$ss['createdby'].'</p>
				    <a href="inclass.php?classid='.$ss['classid'].'" class="btn btn-primary">Go to Classroom</a>
				  </div>
				</div><br><br>';
			}

		?>
	
</body>
<script type="text/javascript">
	var items=document.getElementsByName('n')
	for (var i = 0; i < items.length; i++) {
  items[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace("active","");
  this.className += "active";
  });
}

	var sidebaritems=document.getElementsByClassName('item')
	for (var i = 0; i < sidebaritems.length; i++) {
  sidebaritems[i].addEventListener("click", function() {
  var current = document.getElementsByClassName(" highlight");
  current[0].className = current[0].className.replace("highlight"," ");
  this.className += " highlight";
  });
}

function sidebartoggle() {
	var sidebar=document.getElementById('sidebar');
	sidebar.classList.toggle("active");
}

</script>
</html>

	
		
