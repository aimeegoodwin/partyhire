<!DOCTYPE html>
<html>
<style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: rgb(202, 128, 245);
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: black;
  text-decoration: none;
  font-size: 20px;
  width: 14.2%; 
  text-align: center;
}

.navbar a:hover {
  background-color: white;
}

.navbar a.active {
  background-color: aqua;
}


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
<title>Current working staff</title>
<body  bgcolor = "#E0FFFF">
<div class="navbar"> 
    <a class="active" href="best_customers.php"><b>Best Customers</b></a> 
    <a href="order_status.php"><b>Orders</b></a> 
    <a href="staff_tracking.php"><b>Clocked in Staff</b></a>
    <a href="best_products.php"><b>Best Products</b></a> 
    <a href="manager_override.php"><b>Amend Staff Hours</b></a> 
    <a href="pricechange.php"><b>Edit Inventory</b></a> 
    <a href="manager_login.php"><b>Logout</b></a> 
</div>
    <h1>Best Customers</h1>

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







$sql = "SELECT db_cust_name, db_company_name, COUNT(DISTINCT Event_ID) AS num_orders FROM Customer INNER JOIN Event ON Customer.db_address = Event.address GROUP BY db_cust_name ORDER BY num_orders DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    
  echo "<table><tr><th>Customer Name</th><th>Company Name</th><th>Amount of orders to date</th></tr>";

  // output data of each row
  while($row = $result->fetch_assoc()) {

    
    echo "<tr><td>".$row["db_cust_name"]."</td><td>".$row["db_company_name"]."</td><td>".$row["num_orders"]."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
