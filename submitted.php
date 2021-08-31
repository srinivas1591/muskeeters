<?php 
	include 'navbar.php';
	include 'database.php';
	if(!isset($_SESSION['ac1']))
	{
		header('location:studenttests.php');
	}

	if(!isset($_POST['ac1']) || !isset($_POST['ac2']) || !isset($_POST['ac3'])|| !isset($_POST['ac4'])|| !isset($_POST['ac5']))
	{
		$_SESSION['warning']="Please answer all questions";
		header('location:testsubs.php?testid='.$_SESSION['testid']);
	}

	$marks=0;

	if($_POST['ac1'] == $_SESSION['ac1'])
	{
		$marks++;
	}
	if($_POST['ac2'] == $_SESSION['ac1'])
	{
		$marks++;
	}
	if($_POST['ac3'] == $_SESSION['ac1'])
	{
		$marks++;
	}
	if($_POST['ac4'] == $_SESSION['ac1'])
	{
		$marks++;
	}
	if($_POST['ac5'] == $_SESSION['ac1'])
	{
		$marks++;
	}

	$classid=$_SESSION['classroom'];
	$testid=$_SESSION['testid'];
	$az=mysqli_query($database , "insert into testsubs values('$testid','$classid','$username','$marks')");
	if($az)
	{
		header('location:studenttests.php');
	}
	else
	{
		$_SESSION['warning']="some error please try again";
		header('location:testsubs.php?testid='.$_SESSION['testid']);	
	}

?>
