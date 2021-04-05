<?php session_start();?>


<?php



   include("db_connect.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    

      $myname = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $_SESSION['user'] = $_POST['name'];
      $_SESSION['password'] = $_POST['password'];
      
      $sql = "SELECT * FROM Customer WHERE db_cust_name = '$myname' && db_password = '$mypassword'";
      $results = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($results);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['password'] = $mypassword && $_SESSION['user'] = $myname;

         header("location: event_form.php");
      }else {
         $error = "Your name or password is invalid";
      }
   }
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
         <div style = "width:300px; border: solid 5px #B0E0E6; " align = "left">
            <div style = "background-color:#ADD8E6; color: #663399; padding:5px;"></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Name:</b><br></label><input type = "text" name = "name" class = "box"/><br><br>
                  <label><b>Password:</b></label><input type = "password" name = "password" class = "box" /><br><br>
                  <input type = "submit" value = " Login "/><br />
                  <p>Don't have an account? <a href="customer_registration.html">Sign up now</a>.</p>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>