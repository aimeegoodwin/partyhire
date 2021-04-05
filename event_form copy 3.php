<?php session_start();


$password = $_SESSION['user'];
$name = $_SESSION['login_user'];

?>

<?php 
include ("db_connect.php");


$sql = "SELECT * FROM Customer WHERE db_password = 535364";
$result = $db->query($sql);



?>
<html>
<head>
    <style>
        table
        th {
            text-align: left;
        background-color: red;
        color: black;
        }
    </style>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Customer login</title>
</head> 

   
<body  bgcolor = "#E0FFFF"> 
      
      <div align = "center">
      <img src="DPH.jpg" alt="DPH" height="180" width="250"> <h2>Customer Login</h2>
         <div style = "width:500px; border: solid 5px #B0E0E6; " align = "left">
            <div style = "background-color:#ADD8E6; color: #663399; padding:5px;"></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                <table align: "center">
                <tr>
                  <td><b>Name:</b><br></td>
                  <td><?php echo $name  ?></td>
                </tr>
                <tr>
                    <td><b>Method: *:</b></td>
                    <td>
                    <select name="method" id="method" required>
                    <option value="0"> Collection </option>
                    <option value="1"> Delivery </option>
                    </select>
                    </td>
                </tr>          
                <tr>
                <td><b>Delivery Address:</b></td>
                <td>        
                <?php 
                if(mysqli_num_rows($result)> 0)
                {
                    while ($row= mysqli_fetch_array($result))
                    {
	                    $address = $row["db_address"];
                        } echo "$address";

                }   ?>
                </td>
                </tr>

                </table>
                  <input type = "submit" value = " Login "/><br />
                  <p>Don't have an account? <a href="customer_registration.html">Sign up now</a>.</p>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>