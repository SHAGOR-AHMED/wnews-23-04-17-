<?php
	
	// I will keep yelling this
	// DON'T FORGET TO START THE SESSION !!!
	session_start();
	require_once ("../connection/dbConnection.php");
	//if the user is logged in, unset the session
	if(isset($_SESSION['LogStatus']))
	{
		unset($_SESSION['LogStatus']);
	}
	// now that the user is logged out,
	// go to login page
	header('Location: index.php');
	
?>