<?php
	session_start();

	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["uuid"])|| !isset($_POST["name"])|| !isset($_POST["email"])|| !isset($_POST["username"])|| !isset($_POST["pwd"])|| !isset($_POST["scope"])|| !isset($_POST["category"]) || !isset($_POST["topic"]) || !isset($_POST["tutorial"])){
		header("location:/");
		exit();
	}
		require("db.php");
	$uuid = $_POST["uuid"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$scope = $_POST["scope"];
	$category = $_POST["category"];
	$topic = $_POST["topic"];
	$tutorial = $_POST["tutorial"];
	
	$query = "UPDATE admin SET first_name='$name',email='$email',uid='$username',pwd='$pwd',scope='$scope',category='$category',topic='$topic',ebooks='$tutorial' WHERE uid='$uuid';";
	@mysqli_query( $con, $query ) or die(mysqli_error($con));
	echo("success");

	
		
	

?>
