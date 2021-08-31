<?php
	$database = mysqli_connect("localhost","root","","flipr");
	if(!($database))
	{
		echo 'Database Not Connected';
	}
?>