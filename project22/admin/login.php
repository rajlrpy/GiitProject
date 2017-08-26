<?php
	session_start();
	

	if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_SESSION["login_verification_id"])){
		header("location:index.php");
		echo($_POST["email"]." ". $_POST["password"]." " .$_SESSION["login_verification_id"]);
		exit();
	}

	include('db.php');
	$uid = $_POST["email"];
	$pwd= $_POST["password"];
	$sql="select admin_id,status,pwd from admin where uid='$uid' and pwd ='$pwd';";
	$res = @mysqli_query($con,$sql)or die("unable to execute query");
	if (mysqli_num_rows($res)==0){
		die("fail");
	}
	
	$row=mysqli_fetch_array($res);
	$_SESSION["admin_id"]=$row["admin_id"];
	$_SESSION["login_status"]="true";
	
	
	$st=$row["status"];
	if($st==0)
	{
	/*echo("
		<div class='alert alert-warning'>
		ACCCOUNT DEACTIVATED
		
		</div>
	");*/
	echo("deactive");
	}
	else
	echo "success";
	
	
	
	
	
	
	

?>