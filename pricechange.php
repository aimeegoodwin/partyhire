<!DOCTYPE html>
<html>
<head>
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
  width: 14.2%; 
  text-align: center;
}

.navbar a:hover {
  background-color: white;
}

.navbar a.active {
  background-color: aqua;
}

        table, th, td {
			border: 1px solid black ;
			align: center !important; 
        }
    </style>
    <style>
        body {
            background-color: #ADD8E6;
            color: #663399;
			 }
			
    </style>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Form</title>
</head>
<body  bgcolor = "#E6E6FA"> 
   <div class="navbar">
   <a href="best_customers.php"><b>Best Customers</b></a> 
    <a href="order_status.php"><b>Orders</b></a> 
    <a href="staff_tracking.php"><b>Clocked in Staff</b></a>
    <a href="best_products.php"><b>Best Products</b></a> 
    <a href="manager_override.php"><b>Amend Staff Hours</b></a> 
    <a class="active" href="pricechange.php"><b>Edit Inventory</b></a> 
    <a href="manager_login.php"><b>Logout</b></a> 
</div>

	<div>
		<form method="POST" action="adding.php">
		<h2 align= "right">New Equipment</h2>
		<table class="center">

		<tr>   
            <td>
             Product ID :
             </td>
        
           
         <td>
             <input type="text" placeholder="Product ID" name="Product_id" required>
         </td>
     </tr>
           
     <tr>
         <td>
             Product Name:
         </td>
         <td>
             <input type="text" placeholder="Product Name" name="Product_name" required>
         </td>
     </tr>
	 
	 <tr>
         <td>
             Product Type:
         </td>
         <td>
		 	<select name="Product_type">
    		<option value="Furniture">Furniture</option>
    		<option value="Glassware">Glassware</option>
    		<option value="Cutlery">Cutlery</option>
			<option value="Marquees">Marquees</option>
			<option value="Crockery">Crockery</option>
			<option value="Linen">Linen</option>
			</select>

         </td>
     </tr>

	 <tr>
         <td>
            Image:
         </td>
         <td>
			<input type="file" placeholder="Image Upload" name="image">

         </td>
     </tr>

	 <tr>
 
 		<td>
			 Overall Quantity :
 		</td>
 		<td>
	 		<input type="text" placeholder="Overall Quantity" name="Qty_owned" required>
		 </td>
	</tr>   

     <tr>
 
         <td>
             Quantity on Hand :
         </td>
         <td>
             <input type="text" placeholder="Quantity on Hand" name="Qty_on_hand" required>
         </td>
     </tr>

	<tr>
        <td>
            Price:
        </td>
        <td>
            <input type="text" placeholder="Price" name="Price" required>
        </td>
    </tr>

    </table>
    <input type ="Submit" align ="center" value="Submit" name="">
    
</form>
	</div>
	<br>
    <h2 align="right">Edit and delete Equipment</h2>
	<div>

		<table classs ="center" border="3" >
			<thead>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Quantity Owned</th>
				<th>Quantity on Hand</th>
                <th>Price</th>
				<th>Edit or Delete</th>
				<th>Place on Special offer</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include ("detail2.php");
                    
					$query=mysqli_query($db,"select * from `Inventory`");
                    
					while($row=mysqli_fetch_array($query)){
						
                        
						?>
						<tr>
							<td><?php echo $row['Product_id']; ?></td>
							<td><?php echo $row['Product_name']; ?></td>
							<td><?php echo $row['Product_type']; ?></td>
							<td><?php echo $row['Qty_owned']; ?></td>
							<td><?php echo $row['Qty_on_hand']; ?></td>
                            <td><?php echo $row['Price']; ?></td>
							<td>
								<a href="Editing.php?id=<?php echo $row['Product_id']; ?>">Edit</a>
								<a href="deleting.php?id=<?php echo $row['Product_id']; ?>">Delete</a>
							</td>
							<td>
								<a href="special.php?id=<?php echo $row['Product_id']; ?>">Special offer</a>
							</td>

						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<h2 align= "right">Items on Offer</h2>
	<div>

		<table class="center" border="3">
			<thead>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Quantity Owned</th>
				<th>Quantity on Hand</th>
                <th>Price</th>
				<th>Edit or Delete</th>
				<th>Take off Special offer</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include('detail2.php');
                    
					$query=mysqli_query($db,"select * from `Inventory` where Offer = 'Y'");
                    
					while($row=mysqli_fetch_array($query)){
						
                        
						?>
						<tr>
							<td><?php echo $row['Product_id']; ?></td>
							<td><?php echo $row['Product_name']; ?></td>
							<td><?php echo $row['Product_type']; ?></td>
							<td><?php echo $row['Qty_owned']; ?></td>
							<td><?php echo $row['Qty_on_hand']; ?></td>
                            <td><?php echo $row['Price']; ?></td>
							<td>
								<a href="Editeq.php?id=<?php echo $row['Product_id']; ?>">Edit</a>
								<a href="deleteeq.php?id=<?php echo $row['Product_id']; ?>">Delete</a>
							</td>
							<td>
								<a href="removespecial.php?id=<?php echo $row['Product_id']; ?>">Remove from Special Offer</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>	
</body>
</html>