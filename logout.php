<?php

session_start();
$id = $_SESSION['id'];

$con=mysqli_connect("localhost","root","") or die (mysqli_error());
mysqli_select_db($con,"BookMe");
	
mysqli_query($con,"UPDATE `user_table` SET `status` = 0 WHERE `user_table`.`id` = '$id'");
header('Location: index.html');
mysqli_close($con);
?>