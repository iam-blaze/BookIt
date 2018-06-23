<?php
session_start();
$id = $_SESSION['id'];
$_SESSION['id'] = $id;
$bus_num=$_SESSION['bus_num'];
$from_table=$_SESSION['from_table'];

$con = mysqli_connect("localhost","root","","BookIt");

$result = mysqli_query($con,"select * from user_table where id='$id'") or die(mysql_error());
$row = mysqli_fetch_array($result);
if($row ['id']==$id && $row ['status']==1)
{
     $name=$_POST['bus_name'];
     $type=$_POST['bus_type'];
     $ph_no=$_POST['ph_no'];
     $des=$_POST['destination'];
     $date=$_POST['date'];
     $start=$_POST['start'];
     $end=$_POST['end'];
     $rn=rand(1,20);
     
     $imagename=$_FILES["upload"]["name"]; 
     $imagetmp=addslashes (file_get_contents($_FILES['upload']['tmp_name']));
     $insert_image="INSERT INTO $from_table VALUES('$imagetmp','$imagename') WHERE bus_name='$bus_num'";
     mysql_query($insert_image);
     
     $cost=$_POST['cost'];
     
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set bus_name='$name' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set bus_type='$type' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set ph_no='$ph_no' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set destination='$des' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set date='$date' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set start_time='$start' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set end_time='$end' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set seat='$rn' where bus_num='$bus_num'");
     mysqli_query($con,"UPDATE `BookIt`.`$from_table` set cost='$cost' where bus_num='$bus_num'");
     header("location:editAdmin.php");
}
?>