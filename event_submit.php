<?php session_start(); 

include ("db_connect.php");


$password = $_SESSION['password'];
$name = $_SESSION['user'];





$query = "SELECT * FROM Customer WHERE db_cust_name = '$name'";
$result = $db->query($query);
if(mysqli_num_rows($result)> 0)
{
    while ($row= mysqli_fetch_array($result))
    {
	    $address = $row["db_address"];
    }

}  

$DPH = "DPH Dublin 3";
$event_date= $_POST['date_event'];
$delivery_date = $_POST['date_del'];
$return_date = $_POST['date_return'];
$guests = $_POST['guest'];
$method = $_POST['method'];
$date = date('y-m-d');


if($method > 0){

    $sql  = "INSERT INTO Event (";
    $sql .= "event_date,  order_date, address, no_guests, delivery_date, return_date";
    $sql .= ") VALUES (";
    $sql .= "'$event_date', '$date', '$address','$guests', '$delivery_date', '$return_date')";

} else {
    $sql  = "INSERT INTO Event (";
    $sql .= "event_date,  order_date, address, no_guests, delivery_date, return_date";
    $sql .= ") VALUES (";
    $sql .= "'$event_date', '$date', '$DPH','$guests', '$delivery_date', '$return_date')";
}



//echo $sql;  //to check code. swap out when correct

$result1 = $db->query($sql); 


?>
<script language="javascript">	

	document.location.replace("submit_order.php");

</script>