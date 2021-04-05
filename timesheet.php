<?php session_start(); 

include ("db_connect.php"); 

// Check if already clocked for specific request
$id = $_SESSION['user'];
$date = date('y-m-d');

$sql = "SELECT * FROM Staff WHERE db_staff_ID=" . $id . " LIMIT 1";
$result2 = $db->query($sql);



$query= "SELECT*FROM TimeClock WHERE staff_id = '$id' AND db_date = '$date' AND db_clockin IS NOT NULL";
$result= $db->query($query); 

$query1= "SELECT*FROM TimeClock WHERE staff_id = '$id' AND db_date = '$date' AND db_clockin IS NOT NULL AND db_clockout IS NOT NULL";
$result1= $db->query($query1);

 ?>



<html lang="en">
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
  width: 25%; 
  text-align: center;
}

.navbar a:hover {
  background-color: white;
}

.navbar a.active {
  background-color: aqua;
}
</style>
    <title>Job timesheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script> 
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
        }
    </script>
    </script>
    <body bgcolor = "#E0FFFF" onload = "startTime()"> 
    <div class="navbar">
    <a class="active" href="timesheet.php"><b>Clock in</b></a> 
    <a href="staff_homepage.html"><b>Home</b></a> 
    <a href="product_return.php"><b>Inventory Log</b></a> 
    <a href="staff_login.php"><b>Logout</b></a> 
    </div>
    <p><?php
    
    if(mysqli_num_rows($result2)> 0)
    {
        while ($row= mysqli_fetch_array($result2))
        {
	    $employee = $row["staff_name"];
        }

    echo "<h1 align='center' style='font-size:60pt;'>" . $employee . "</h1>";

    }
    ?></p>
    <div id="txt" align="center" style="font-size:60pt;"></div>
    <form action="submit_time.php" method="post">
        <table align = "center">
        <?php

        if(mysqli_num_rows($result1)> 0) {
            ?>
        <tr>
            <td><button id='clockin' style='background-color: red; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockin' class ='click' disabled>Clocked<br /> IN</button></td>
            <td><button id='clockout' style='background-color: red; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockout' class='click' disabled>Clocked<br />OUT</button></td>;
        </tr>
        <?php 
        } elseif(mysqli_num_rows($result)>0)  { 
            ?>
        <tr>
            <td><button id='clockin' style= 'background-color: red; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockin' class='click' disabled>CLOCKED<br /> IN</button></p></td>
            <td><button id='clockout' style='background-color: green; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockout' class='click'>Time<br />OUT</button></td>;
        </tr>
        <?php
        } else { 
            ?>
        <tr>
            <td><button id='clockin' style= 'background-color: green; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockin' class='click'>TIME<br /> IN</button></p></td>
            <td><button id='clockout' style='background-color: green; color: white; width:200px; height:200px; margin:20px; font-size:30pt;' name='clockout' class='click' diabled>Time<br />OUT</button></td>;
        </tr>
        <?php 
        } 
    ?>        
    </table>
    </form>
    </body>
</html>

 
