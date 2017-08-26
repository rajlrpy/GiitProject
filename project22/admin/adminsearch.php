<?php
	session_start();
	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["searchuser"])){
		header("location:/");
		exit();
	}

	require("db.php");	
	$searchuser=$_POST["searchuser"];
	$sql="select ad"
	
	

?>