<?php session_start(); 

include ("db_connect.php"); 

$product_id= $_POST['product_id'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];

if($status == 0)

{

    $sql  = "UPDATE Inventory SET Qty_owned = (Qty_owned - $quantity), Qty_on_hand = (Qty_on_hand - $quantity) WHERE Product_id = '$product_id'"; 

} else {

    $sql  = "UPDATE Inventory SET Qty_owned = (Qty_owned + $quantity), Qty_on_hand = (Qty_on_hand + $quantity) WHERE Product_id = '$product_id'"; 

}



//echo $sql;  //to check code. swap out when correct

$result = $db->query($sql);  

?>
<script language="javascript">	

	document.location.replace("returns.html");

</script>