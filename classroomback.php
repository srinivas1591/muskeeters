<?php 
	session_start();
	include 'database.php';
	date_default_timezone_set("Asia/Kolkata"); 
	if(!isset($_SESSION['faculty']))
	{
		header('location:index.php');
	}
	$a=$_SESSION['faculty'];
	$b=$_POST['classname'];
	$c=$_POST['subject'];
	if(strlen(trim($b))==0 || strlen(trim($c))==0)
	{
		$_SESSION['warning']="classname and subject can't be empty";
		header('location:classroomform.php');
	}
	else{
	$u=date('Y/n/j H:i:s');
	$m=mysqli_query($database,"select * from users where username='$a' and role='Faculty'");
	$n=mysqli_fetch_assoc($m);
	$z=$n['branch'];
	$y=uniqid();
	$chk=mysqli_query($database,"insert into classrooms values('$y','$b','$u','$z','$a','$c')");
	if($chk)
	{
		header('location:facultydashboard.php');
	}
	else 
	{
		$_SESSION['warning']="class creation failed . Try Again!!";
		header('location:classroomform.php');
	}
}
?>