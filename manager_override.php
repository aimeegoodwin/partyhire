<html>
<head>
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

        title{
            color:white;
        }
        table
        th {
            text-align: left;
        background-color: red;
        color: black;
        }
        tr{
            color: black;
        }
    </style>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Manager Override</title>
</head> 

   
   <body  bgcolor = "#E6E6FA"> 
   <div class="navbar">
   <a href="best_customers.php"><b>Best Customers</b></a> 
    <a href="order_status.php"><b>Orders</b></a> 
    <a href="staff_tracking.php"><b>Clocked in Staff</b></a>
    <a href="best_products.php"><b>Best Products</b></a> 
    <a class="active" href="manager_override.php"><b>Amend Staff Hours</b></a> 
    <a href="pricechange.php"><b>Edit Inventory</b></a> 
    <a href="manager_login.php"><b>Logout</b></a> 
</div>
      <div align = "center">
      <img src="DPH.jpg" alt="DPH" height="180" width="250"> <h2>Manager Login</h2>
         <div style = "width:300px; border: solid 5px #B0E0E6; " align = "left">
            <div style = "background-color:#ADD8E6; color: #E0FFFF; padding:5px;"></div>
				
            <div style = "margin:30px">
               
               <form action = "override.php" method = "post">
                  <label><b>Staff ID:</b><br></label><input type = "text" name = "staffid" class = "box" required/><br><br>
                  <label><b>Date:</b><br></label><input type = "date" name = "date" class = "box" required/><br><br>
                  <label><b>Time in:</b><br></label><input type = "time" name = "timein" class = "box" required/><br><br>
                  <label><b>Time out:</b><br></label><input type = "time" name = "timeout" class = "box" required/><br><br>
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>