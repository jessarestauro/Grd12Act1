<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM products ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Product Name</td>
		<td>Product Description</td>
		<td>Product Price</td>
		<td>Quantity</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['pname']."</td>";
		echo "<td>".$row['pdescription']."</td>";
		echo "<td>".$row['pprice']."</td>";	
		echo "<td>".$row['pquantity']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
