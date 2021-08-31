<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stident Assignment form</title>
</head>
<body>
	<?php 
		
		if(!isset($_GET['assign']))
		{
			header('location:studentassignments.php');
		}
		$asid=$_GET['assign'];
		$_SESSION['asid']=$asid;
	?>
	<br>

		<div class="card">
			  <div class="card-header">
			   Submit Assignment <?php  echo $asid;?>
			  </div>
			  <div class="card-body">
			  	<form method="post" action="backsubmit.php" enctype="multipart/form-data">
			  		
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
			</div></div>
</body>
</html>
