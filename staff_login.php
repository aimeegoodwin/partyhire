<?php session_start();?>


<?php



   include("db_connect.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      //$_SESSION['user'] = $_POST['student_no']
      //$_SESSION['login_user'] = $_POST['name']
      $mystaffid = mysqli_real_escape_string($db,$_POST['staffid']);
      $mystaffpassword = mysqli_real_escape_string($db,$_POST['staffpassword']); 
      $_SESSION['user'] = $_POST['staffid'];
      
      $sql = "SELECT * FROM Staff WHERE db_staff_ID = '$mystaffid' && db_staff_password = '$mystaffpassword'";
      $results = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($results);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['user_no'] = $mystaffpassword && $_SESSION['login_user'] = $mystaffid;

         header("location: staff_homepage.html");
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
     <title>Staff login</title>
</head> 

   
   <body  bgcolor = "#E0FFFF"> 
      
      <div align = "center">
      <img src="DPH.jpg" alt="DPH" height="180" width="250"> <h2>Staff Login</h2>
         <div style = "width:300px; border: solid 5px #B0E0E6; " align = "left">
            <div style = "background-color:#ADD8E6; color: #663399; padding:5px;"><b>Staff login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Staff ID:</b><br></label><input type = "text" name = "staffid" class = "box" maxlength="4" /><br><br>
                  <label><b>Password:</b></label><input type = "password" name = "staffpassword" class = "box" maxlength="6" /><br><br>
                  <input type = "submit" value = " Submit "/><br />
                <p><a
                href="manager_login.php">Manager</a>.</p>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>