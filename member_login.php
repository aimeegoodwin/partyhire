<?php session_start();?>


<?php



   include("connect.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      //$_SESSION['user'] = $_POST['student_no']
      //$_SESSION['login_user'] = $_POST['name']
      $myname = mysqli_real_escape_string($db,$_POST['name']);
      $mystudent_no = mysqli_real_escape_string($db,$_POST['student_no']); 
      $_SESSION['user'] = $_POST['student_no'];
      
      $sql = "SELECT * FROM members WHERE db_name = '$myname' && db_student_no = '$mystudent_no'";
      $results = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($results);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['user_no'] = $mystudent_no && $_SESSION['login_user'] = $myname;

         header("location: ticket_app.php");
      }else {
         $error = "Your name or student number is invalid";
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
     <title>Member login</title>
</head> 

   
   <body  bgcolor = "#FFFAFA"> 
      
      <div align = "center">
      <img src="tennis.png" alt="tennis" height="120" width="180"> <h2>TCD Tennis CLub</h2>
         <div style = "width:300px; border: solid 1px #FF0000; " align = "left">
            <div style = "background-color:#333333; color: #FF0000; padding:3px;"><b>Member login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Name:</b><br></label><input type = "text" name = "name" class = "box"/><br><br>
                  <label><b>Student no:</b></label><input type = "password" name = "student_no" class = "box" /><br><br>
                  <input type = "submit" value = " Submit "/><br />
                  <p>Don't have an account? <a href="member_reg.html">Sign up now</a>.</p>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>