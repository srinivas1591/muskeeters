<?php 
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
</head>
<body>
	<?php 
		
		include 'database.php';
		if(!isset($_GET['testid']))
		{
			header('location:redirect.php');
		}
		$testid=$_GET['testid'];
		$_SESSION['testid']=$testid;
	?>
	<?php 
		if(isset($_SESSION['warning']))
		{
			echo '<div id="warning2">'.$_SESSION['warning'].'</div>';
			unset($_SESSION['warning']);
		}
	?>
	<br>

	<h6>Test Id : <?php echo $testid;?></h6>

	<form action="submitted.php" method="post">
	<?php 
		$ac=1;
		$myq=mysqli_query($database , "select * from addques where testid='$testid'");
		if(mysqli_num_rows($myq)==0)
		{
			header('location:redirect.php');
		}
		while($mmy=mysqli_fetch_assoc($myq))
		{
			$nam='ac'.$ac;
			echo '<div class="card">
			  <div class="card-header">
			    Q.no :'.$ac.'
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">'.$mmy['question'].'</h5>
			    <div class="form-check">
				  <input class="form-check-input" type="radio" name="'.$nam.'" id="flexRadioDefault1" value="a">
				    '.$mmy['a'].'
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="'.$nam.'" id="flexRadioDefault2" value="b">
				    '.$mmy['b'].'
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="'.$nam.'" id="flexRadioDefault3" value="c">
				    '.$mmy['c'].'
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="'.$nam.'" id="flexRadioDefault4" value="d">
				    '.$mmy['d'].'
				</div>
			  </div>
			</div>';
			$_SESSION[$nam]=$mmy['e'];
			$ac++;
		}

	?><br>
	<button class="btn btn-primary">Go somewhere</button>
	</form>
	<br><br>
	
</body>
</html>
