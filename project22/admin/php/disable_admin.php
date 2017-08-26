<?php
	session_start();
	require("db.php");
	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["uuid"])){
		header("location:/");
		exit();
	}
	$uid = $_POST["uuid"];
	$query = "UPDATE admin SET status=0 WHERE admin_id=$uid;";
	@mysqli_query( $con, $query ) or die("error");
	echo("success");
?>