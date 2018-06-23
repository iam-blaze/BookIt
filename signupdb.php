<?php
$con = mysqli_connect("localhost","root","","BookIt") or die (mysql_error());

	$name = $_POST['name'];
	$id = $_POST['user'];
	$Ph_no = $_POST['Ph_no'];
	$Mail_id = $_POST['Mail_id'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];


	if ($password==$password2)
	{
		$sql="INSERT INTO `user_table` (`Name`, `id`, `Ph_no`, `Email_id`, `password`) VALUES ('$name', '$id', '$Ph_no', '$Mail_id', '$password')";
		mysqli_query($con,$sql);
                mysqli_query($con,"UPDATE `user_table` SET `status` = 1 WHERE `user_table`.`id` = '$id'");
		header("location:newRide.php");
	}
	else
	{
           echo "<script type='text/javascript'>if (confirm('Passwords mismatched') == true) {window.location = \"signup.html\"}</script>";
	}
mysqli_close($on);
?>
