<?php
session_start();
$id = $_SESSION['id'];
$_SESSION['id'] = $id;
$from_table = $_SESSION['from_table'];

$con = mysqli_connect("localhost","root","","BookIt");

$result = mysqli_query($con,"select * from user_table where id='$id'") or die(mysql_error());
$row = mysqli_fetch_array($result);
if($row ['id']==$id && $row ['status']==1)
{
     $name=$_POST['bus_name'];
     $bus_num=$_POST['bus_num'];
     $type=$_POST['bus_type'];
     $ph_no=$_POST['ph_no'];
     $des=$_POST['destination'];
     $rating = $_POST['rating'];
     $date=$_POST['date'];
     $start=$_POST['start'];
     $end=$_POST['end'];
     $rn= rand(1, 20);
     
     $imagename=$_FILES["upload"]["name"]; 
     $imagetmp=addslashes (file_get_contents($_FILES['upload']['tmp_name']));
     $insert_image="INSERT INTO `$from_table` VALUES('$imagetmp','$imagename') WHERE bus_num='$bus_num' and bus_type='$type' and bus_name = '$name'";
     
     $cost=$_POST['cost'];
                 
            $sql="INSERT INTO `BookIt`.`$from_table` ( `bus_num`, `bus_name`, `bus_type`, `ph_no`, `from_table`, `destination`, `date`, `start_time`, `end_time`, `rating`,`seat`,`cost`) VALUES ($bus_num', '$name', '$type', '$ph_no', '$from_table', '$des', '$date', '$start', '$end', '$rating','$rn','$cost')";
            mysqli_query($con, $sql);
            mysqli_query($con,$insert_image);
            echo "<script type='text/javascript'>if (confirm('Bus Added successfully') == true) {window.location = \"newRide.php\"}</script>";
            mysqli_close($con);
           
         
}
?>