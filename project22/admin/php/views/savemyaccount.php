<?php
	session_start();

	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["uuid"])|| !isset($_POST["name"])|| !isset($_POST["email"])|| !isset($_POST["username"])|| !isset($_POST["pwd"])){
		exit("rgd");
		header("location:/");
		exit();
	}
		require("db.php");
	$uuid = $_POST["uuid"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	 
	
	$query = "UPDATE admin SET first_name='$name',email='$email',uid='$username',pwd='$pwd' WHERE admin_id='$uuid';";
	@mysqli_query( $con, $query ) or die(mysqli_error($con));
	echo("success");
 

?>
