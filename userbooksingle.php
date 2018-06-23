<?php
session_start();
$id = $_SESSION['id'];
$_SESSION['id'] = $id;
$from_table = $_SESSION['from_table'];
$bus_num = filter_input(INPUT_POST, 'bus_num');

$con = mysqli_connect("localhost","root","","BookMe");

$result = mysqli_query($con,"select * from user_table where id='$id'") or die(mysql_error());
$row = mysqli_fetch_array($result);

if($row ['id']==$id && $row ['status']==1)
{
    $result1 = mysqli_query($con,"select * from $from_table where bus_num='$bus_num'") or die(mysql_error());
    $row1 = mysqli_fetch_array($result1);
        if($row1['bus_num']==$bus_num){
           
            $num=$row1['bus_num'];
            $name=$row1['bus_name'];
            $type=$row1['bus_type'];
            $ph=$row1['ph_no'];
            $frm=$from_table;
            $des=$row1['destination'];
            $date=$row1['date'];
            $start=$row1['start_time'];
            $end=$row1['end_time'];
            $rating=$row1['rating'];
            $cost=$row1['cost'];
            $rn= rand(1, 20);
       
            
            $sql="INSERT INTO `BookMe`.`ride_table` (`id`, `bus_num`, `bus_name`, `bus_type`, `ph_no`, `from_table`, `destination`, `date`, `start_time`, `end_time`, `rating`,`seat`, `cost`) VALUES ('$id', '$num', '$name', '$type', '$ph', '$frm', '$des', '$date', '$start', '$end', '$rating','$rn','$cost')";
            mysqli_query($con, $sql);           
            echo "<script type='text/javascript'>if (confirm('Booked successfully') == true) {window.location = \"newRide.php\"}</script>";
      }
            
}   
            mysqli_close($con);
            ?>
