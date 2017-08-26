<?php
	session_start();

	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["aname"])){
	 
		header("location:/");
		exit();
	}
		require("db.php");
	$name = $_POST["aname"];
	 
	
	$query = "insert into scope(scope_nm) values('$name');";
	@mysqli_query( $con, $query ) or die(mysqli_error($con));
	echo("success");
 

?>
