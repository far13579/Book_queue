<?php
$con = mysqli_connect("localhost","root","","queue_booking") or die("Error: " . mysqli_error($con)); 
mysqli_query($con, "SET NAMES 'utf8' ");
// $query = "SELECT * FROM employ";
// $result = mysqli_query($con, $query);
?>