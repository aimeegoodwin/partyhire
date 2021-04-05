<?php session_start();

include "db_connect.php";
$name = $_SESSION['user'];



$date = date('y-m-d');



$query = "SELECT Event_ID, db_cust_name, db_address FROM Event INNER JOIN Customer WHERE Event.address = Customer.db_address AND Event.order_date = '$date'";

$result = $db->query($query);
if(mysqli_num_rows($result)> 0)
{
    while ($row= mysqli_fetch_array($result))
    {
	    $event_id = $row["Event_ID"];
    }

} 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>

         table{ 
            border-collapse:separate; 
        border-spacing: 0 15px; 
        tr {
            text-align: left;
        }
    </style>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Inventory Form</title>
</head>

<body  bgcolor = "#E0FFFF"> 
   
   <div align = "center">
   <img src="DPH.jpg" alt="DPH" height="180" width="250"> <h2>INVENTORY LOG</h2>
      <div style = "width:400px; border: solid 5px #B0E0E6; " align = "left">
         <div style = "background-color:#ADD8E6; color: #663399; padding:3px;" align = "left">    
        <div style = "margin:30px">
         
            <form >
                <table align = "center">
                    <tr>
                    <td><b>TESTING *:</b></td>
                    <td> <?php echo $event_id ?> </td>
                    </tr>
                    <tr>
                    <td><b><b><?php echo $name ?></b></b></td>
                    <td><input type= "text" name="quantity" id="quantity" size=5 required></td>
                    </tr>
                    <tr>
                    <td><b>Status *:</b></td>
                    <td>
                    <select name="status" id="status" required>
                    <option value="2"> Returns </option>
                    <option value="1"> New Stock </option>
                    <option value="0" > Faulty </option>
                    </select>
                    </td>
                    </tr>
                </table>
                <input type="submit" value="Log">
            </form>
    
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
        </div>
    </div>
    </div>
 
</body>
</html>