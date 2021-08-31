<?php 
	include 'database.php';
	session_start();
	date_default_timezone_set("Asia/Kolkata"); 
	if(!isset($_SESSION['classroom']))
	{
		$_SESSION['warning']="cant schedule class try again";
		header('location:schedule.php');
	}
	$a=$_SESSION['classroom'];
	$fet=mysqli_query($database,"select * from classrooms where classid='$a'");
	$lafet=mysqli_fetch_assoc($fet);
	$b=$lafet['subject'];
	$c=$_POST['fac'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	$f=$_POST['f'];
	$g=$_POST['g'];

	if(strlen($c)==0 || strlen($d)==0 || strlen($e)==0 || strlen($f)==0 || strlen($g)==0)
	{
		$_SESSION['warning']="cant schedule class try again";
		header('location:schedule.php');
	}


	$o=$g.' '.$e.':00';
	$u=date('Y/n/j H:i:s');
	$sec=strtotime($o)-strtotime($u);
	$min=abs(round($sec/60));



	$start=$g.' '.$d.':00';
	$u=date('Y/n/j H:i:s');
	$sec1=strtotime($start)-strtotime($u);
	$min1=abs(round($sec1/60));


	mysqli_query($database,"insert into calander values('$a','$b','$c','$d','$e','yettostart','$g','$f')");
	$oo=uniqid();
	$y=mysqli_query($database,"create event `$oo` on schedule at current_timestamp + interval $min minute on completion not preserve enable do update calander set status='completed' where classid='$a'");
	$oi=uniqid();
	$yi=mysqli_query($database,"create event `$oi` on schedule at current_timestamp + interval $min1 minute on completion not preserve enable do update calander set status='live' where classid='$a'");

	if($y && $yi)
	{
		header('location:schedule.php');
	}
	else
	{	
		$_SESSION['warning']="cant schedule class try again";
		header('location:schedule.php');
	}
?>