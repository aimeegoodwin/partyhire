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
    <a href="best_customers.php"><b>Best Customers</b></a> 
    <a href="order_status.php"><b>Orders</b></a> 
    <a href="staff_tracking.php"><b>Clocked in Staff</b></a>
    <a class="active" href="best_products.php"><b>Best Products</b></a> 
    <a href="manager_override.php"><b>Amend Staff Hours</b></a> 
    <a href="pricechange.php"><b>Edit Inventory</b></a> 
    <a href="manager_login.php"><b>Logout</b></a> 
</div>
    <h1>Best Products</h1>

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







$sql = "SELECT Product_name, Product_type, SUM(Qty) AS total, SUM(Qty*Price) AS revenue FROM `Order` INNER JOIN Inventory WHERE Inventory.Product_id = `Order`.Product_id GROUP BY Product_name ORDER BY total DESC;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    
  echo "<table><tr><th>Product Name</th><th>Description</th><th>Total Orders</th><th>Total Revenue</th></tr>";

  // output data of each row
  while($row = $result->fetch_assoc()) {

    
    echo "<tr><td>".$row["Product_name"]."</td><td>".$row["Product_type"]."</td><td>".$row["total"]."</td><td>".$row["revenue"]."</td></tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>