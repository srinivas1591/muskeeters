<?php 
	include 'database.php';
	session_start();
	date_default_timezone_set("Asia/Kolkata"); 
	if(!isset($_SESSION['classroom']) || !isset($_SESSION['asid']))
	{
		$_SESSION['warning']="cant schedule class try again";
		header('location:studentassignments.php');
	}
	$a=$_SESSION['asid'];
	$b=$_SESSION['classroom'];
	$c=$_SESSION['student'];

	


	$allowedExts = array("pdf");
	$temp = explode(".", $_FILES["pdf_file"]["name"]);
	$extension = end($temp);
	$upload_pdf=$_FILES["pdf_file"]["name"];
	move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);


	$wet=mysqli_query($database,"insert into submissions values('$a','$b','$c','$upload_pdf')");

	if($wet)
	{
		header('location:studentassignments.php');
	}
	else
	{	
		$_SESSION['warning']="cant submit. try again";
		header('location:studentassignments.php');
	}
?>