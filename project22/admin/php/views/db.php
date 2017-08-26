<?php
$dbh = "localhost";
$dbu="root";
$con=@mysqli_connect($dbh,$dbu)or die("not connected");
@mysqli_select_db($con,"programming") or die("unable to select db");

//mysqli_close($con)
?>
