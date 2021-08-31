<?php 
	include 'database.php';
	if(!isset($_GET['classid']))
	{
		header('location:redirect.php');
	}
	session_start();
	$classid=$_GET['classid'];
	$userid=$_SESSION['student'];
	if(strlen($classid)==0)
	{
		$_SESSION['warning']="Join Failed. Try again";
		header('location:join.php');
	}
	$a=mysqli_query($database,"insert into students values('$classid','$userid')");
	if($a)
	{
		header('location:home.php');
	}
	else
	{
		$_SESSION['warning']="Join Failed. Try again";
		header('location:join.php');
	}

?>