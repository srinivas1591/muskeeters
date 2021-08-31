<?php 
	session_start();
	include 'database.php';
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];

	if(strlen($a)==0 || strlen($b)==0)
	{
		$_SESSION['warning']="USER name / Password can't be empty";
		header('location:register.php');
	}
	else
	{
		$abc=mysqli_query($database, "insert into users values('$a','$b','$c','$d')");
		if($abc)
		{
			header('location:index.php');
		}
		else 
		{
			$_SESSION['warning']="Something Went wrong";
			header('location:register.php');
		}	
	}


?>