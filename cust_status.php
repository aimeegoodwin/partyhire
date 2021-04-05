<!DOCTYPE html>
<html>
<style>


table{
    border: 1px solid black;
    width: 50%;
} 
th{
    border: 1px solid black;
}

td{
    border: 1px solid black;
    text-align: center;
}

</style>
<div align = "center";>
<title>YOUR CURRENT ORDERS</title>
<body  bgcolor = "#E0FFFF">

    <h1>YOUR CURRENT ORDERS</h1>

<?php
session_start();

$servername = "localhost";
$username = "group_1";
$password = "ooM0wahl";
$dbname = "stu33001_2021_group_1_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$date = date('y-m-d');
$id = $_POST['event'];



$sql = "SELECT Event_ID, event_date, address, IF(order_date = '$date', 'ORDERED', IF(delivery_date = '$date', 'RECEIVED', IF(return_date = '$date', 'COMPLETED', 'PROCESSING'))) AS db_status FROM Event 
WHERE Event_ID = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    
  echo "<table><tr><th>Event ID</th><th>Date of Event</th><th>Address</th><th>Status</th></tr>";

  // output data of each row
  while($row = $result->fetch_assoc()) {

    
    echo "<tr><td>".$row["Event_ID"]."</td><td>".$row["event_date"]."</td><td>".$row["address"]."</td><td>".$row["db_status"]."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>