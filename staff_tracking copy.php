<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<title>Attendee details</title>
</head>
<body>

<?php
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

$sql = "SELECT staff_name, db_date, db_clockin, db_clockout
FROM TimeClock
INNER JOIN Staff
WHERE Staff.db_staff_ID=TimeClock.staff_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Date</th><th>Clockin</th><th>Clockout</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["staff_name"]."</td><td>".$row["db_date"]."</td><td>".$row["db_clockin"]."</td><td>".$row["db_clockout"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
