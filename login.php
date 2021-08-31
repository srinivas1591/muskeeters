<?php
	session_start();
	include 'database.php';
	$a=$_POST['a'];
	$b=$_POST['b'];
	if(strlen($a)==0 || strlen($b)==0)
	{
		$_SESSION['warning']="username and password mustn't be empty";
		header('location:index.php');
	}
	else
	{
		if(!($database))
		{
			echo 'Database Not Connected';
		}

		if(isset($_POST['c']))
		{
			$c=mysqli_query($database,"select * from users where username='$a' and password='$b' and role='Faculty'");
			if(mysqli_num_rows($c)!=0)
			{
				$_SESSION['faculty']=$a;
				header('location:facultydashboard.php');
			}
			else
			{
				$_SESSION['warning']="invalid credentials";
				header('location:index.php');
			}
		}

		if(isset($_POST['d']))
		{
			$c=mysqli_query($database,"select * from users where username='$a' and password='$b' and role='Student'");
			if(mysqli_num_rows($c)!=0)
			{
				$_SESSION['student']=$a;
				header('location:home.php');
			}
			else
			{
				$_SESSION['warning']="invalid credentials";
				header('location:index.php');
			}
		}
	}
?>