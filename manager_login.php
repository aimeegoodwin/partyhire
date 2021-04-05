<?php session_start();?>
<?php



   include("db_connect.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      //$_SESSION['user'] = $_POST['student_no']
      //$_SESSION['login_user'] = $_POST['name']
      $managerid = mysqli_real_escape_string($db,$_POST['managerid']);
      $managerpassword = mysqli_real_escape_string($db,$_POST['managerpassword']); 
      $_SESSION['user'] = $_POST['managerid'];
      
      $sql = "SELECT * FROM executive WHERE db_manager_ID = '$managerid' && db_manager_password = '$managerpassword'";
      $results = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($results);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['user_no'] = $managerpassword && $_SESSION['login_user'] = $managerid;

         header("location: manager_override.php");
      }else {
         $error = "Your name or password is invalid";
      }
   }
?>

<html>
<head>
    <style>
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
     <title>Manager login</title>
</head> 

   
   <body  bgcolor = "#E6E6FA"> 
      
      <div align = "center">
      <img src="DPH.jpg" alt="DPH" height="180" width="250"> <h2>Manager Login</h2>
         <div style = "width:300px; border: solid 5px #B0E0E6; " align = "left">
            <div style = "background-color:#ADD8E6; color: #E0FFFF; padding:5px;"></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Manager ID:</b><br></label><input type = "text" name = "managerid" class = "box" maxlength="4"/><br><br>
                  <label><b>Password:</b></label><input type = "password" name = "managerpassword" class = "box" maxlength="6"/><br><br>
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>