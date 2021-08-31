<?php 
	session_start();
	include 'database.php';
	if(!isset($_SESSION['qcount']) || !isset($_SESSION['testid']))
	{
		header('location:redirect.php');
	}
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	$z=$_POST['z'];
	$f=$_SESSION['testid'];
	if(strlen($a)==0 || strlen($b)==0 || strlen($c)==0 || strlen($d)==0 || strlen($e)==0 || strlen($z)==0)
	{
		$_SESSION['warning']= "cant add question";
	}

	$addq=mysqli_query($database , "insert into addques values('$f','$z','$a','$b','$c','$d','$e')");
	if($addq)
	{
		$_SESSION['qcount']=$_SESSION['qcount']-1;
		if($_SESSION['qcount']==0)
		{
			unset($_SESSION['qcount']);
			unset($_SESSION['testid']);
			header('location:tests.php');
		}
		else
		{
			header('location:testform.php');
		}
	}

?>