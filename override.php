<?php session_start(); ?>

<?PHP

include ("db_connect.php"); 

$staffid= $_POST['staffid'];
$timein = $_POST['timein'];
$timeout = $_POST['timeout'];
$date = $_POST['date'];

$sql  = "INSERT INTO TimeClock (";
$sql .= "staff_id, db_date, db_clockin, db_clockout";
$sql .= ") VALUES (";
$sql .= "'$staffid', '$date','$timein', '$timeout')";

//echo $sql;  //to check code. swap out when correct

$result = $db->query($sql);  

?>
<script language="javascript">	

	document.location.replace("ticket_app.php");

</script>