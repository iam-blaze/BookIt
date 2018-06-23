<?php
$id = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'password');
if ($id == '' && $password == '') {
    header("location:nonUser.php");
}

session_start();
$_SESSION['id'] = $id;
$_SESSION['password'] = $password;

$con = mysqli_connect("localhost","root","","BookIt");

$result = mysqli_query($con,"select * from user_table where id='$id'") or die(mysqli_error());
$row = mysqli_fetch_array($result);

if($row ['id']==$id  && $row['password']==$password){
	mysqli_query($con,"UPDATE `user_table` SET `status` = 1 WHERE `user_table`.`id` = '$id'");
        header("location:newRide.php");
}else if($row ['id']==$id && $row['password']!=$password){
        header("location:booking.php");
}else{
	header("location:signup.html");
}
mysqli_close($con);
?>
