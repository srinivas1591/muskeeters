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
	$b=uniqid();
	$c=$_POST['date'];
	$d=$_POST['time'];
	$e=$_SESSION['faculty'];
	$f=$lafet['subject'];

	if(strlen($c)==0 || strlen($d)==0)
	{
		$_SESSION['warning']="cant schedule class try again";
		header('location:assignment.php');
	}


	$allowedExts = array("pdf");
	$temp = explode(".", $_FILES["pdf_file"]["name"]);
	$extension = end($temp);
	$upload_pdf=$_FILES["pdf_file"]["name"];
	move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);

	$o=$c.' '.$d.':00';
	$u=date('Y/n/j H:i:s');
	$sec=strtotime($o)-strtotime($u);
	$min=abs(round($sec/60));



	$wet=mysqli_query($database,"insert into assignments values('$b','$a','$c','$d','$upload_pdf','$e','$f','live')");
	$oo=uniqid();
	$y=mysqli_query($database,"create event `$oo` on schedule at current_timestamp + interval $min minute on completion not preserve enable do update assignments set status='completed' where assignmentid='$b'");
	

	if($y && $wet)
	{
		header('location:redirect.php');
	}
	else
	{	
		$_SESSION['warning']="cant schedule class try again";
		header('location:assignment.php');
	}
?>