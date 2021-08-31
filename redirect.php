<?php
	session_start();
	if(isset($_SESSION['faculty']))
	{
		header('location:facultydashboard.php');
	}
	elseif (isset($_SESSION['student'])) 
	{
		header('location:home.php');
	}
	else
	{
		header('location:index.php');
	}
?>