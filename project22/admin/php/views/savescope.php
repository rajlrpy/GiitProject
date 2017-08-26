<?php
	session_start();

	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["uuid"])|| !isset($_POST["name"])){
		exit("rgd");
		header("location:/");
		exit();
	}
		require("db.php");
	$uuid = $_POST["uuid"];
	$name = $_POST["name"];
	 
	
	$query = "UPDATE scope SET scope_nm ='$name' WHERE scope_id='$uuid';";
	@mysqli_query( $con, $query ) or die(mysqli_error($con));
	echo("success");
 

?>
