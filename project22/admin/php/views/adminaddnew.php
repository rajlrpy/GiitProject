<?php
session_start();
	if( !isset( $_SESSION["login_status"] ) || !isset($_POST["aname"])){
		header("location:/");
		exit();
	}

	require("db.php");	
	 
	$aname = $_POST["aname"];
	$aemail = $_POST["aemail"];
	$auseraname = $_POST["ausername"];
	$apwd = $_POST["apwd"];
	$ascope = $_POST["ascope"];
	$acategory = $_POST["acategory"];
	$atopic = $_POST["atopic"];
	$atutorial = $_POST["atutorial"];
	
	$query = "insert into admin (first_name,email,uid,pwd,scope,category,topic,ebooks) values ('$aname','$aemail','$auseraname','$apwd','$ascope','$acategory','$atopic','$atutorial');";
	@mysqli_query( $con, $query ) or die("error");
	echo("success");



?>
