<?php 
	session_start();
	include 'database.php';
	date_default_timezone_set("Asia/Kolkata"); 
	if(!isset($_SESSION['classroom']))
	{
		header('location:tests.php');
	}
	$a=uniqid();
	$b=$_SESSION['classroom'];
	$c=$_POST['tname'];
	$d=$_POST['date'];
	$e=$_POST['time'];
	$get=mysqli_query($database,"select * from classrooms where classid='$b'");
	$fget=mysqli_fetch_assoc($get);
	$f=$fget['subject'];

	if(strlen($c)==0 || strlen($d)==0 || strlen($e)==0)
	{
		$_SESSION['warning']="cant create test. try again";
		header('location:tests.php');
	}

	else
	{
		$o=$d.' '.$e.':00';
		$u=date('Y/n/j H:i:s');
		$sec=strtotime($o)-strtotime($u);
		$min=abs(round($sec/60));
		$fin=mysqli_query($database , "insert into tests values('$a','$b','$c','$d','$e','$f','live')");
		$oo=uniqid();
		$y=mysqli_query($database,"create event `$oo` on schedule at current_timestamp + interval $min minute on completion not preserve enable do update tests set status='completed' where testid='$a'");
		if($fin && $y)
		{
			$_SESSION['qcount']=5;
			$_SESSION['testid']=$a;
			header('location:testform.php');
		}	
	}
?>