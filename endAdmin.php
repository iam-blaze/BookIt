<?php
session_start();
$id = $_SESSION['id'];
$_SESSION['id'] = $id;
$seat = filter_input(INPUT_POST, 'seat');
$bus_num = filter_input(INPUT_POST, 'bus_num');
$date = filter_input(INPUT_POST, 'date');
$user = filter_input(INPUT_POST, 'username');

$con = mysqli_connect("localhost","root","","BookMe");

$result = mysqli_query($con,"select * from user_table where id='$id'") or die(mysql_error());
$row = mysqli_fetch_array($result);

if($id=="administrator" && $row['status']==1){
   
    $result1 = mysqli_query($con,"select * from ride_table where id='$id'") or die("error");
    $row1 = mysqli_fetch_array($result1);
                  
            $sql="DELETE FROM ride_table WHERE id='$user' and bus_num='$bus_num' and seat='$seat' and date='$date'";
            mysqli_query($con, $sql);         
            echo "<script type='text/javascript'>if (confirm('Deleted Successfully') == true) {window.location = \"history.php\"}</script>";         
    
 }   
mysqli_close($con);   
            ?>
