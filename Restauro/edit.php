<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$pname=$_POST['pname'];
	$pdescription=$_POST['pdescription'];
	$pprice=$_POST['pprice'];	
	$pquantity=$_POST['pquantity'];	
	
	// checking empty fields
	if(empty($pname) || empty($pdescription) || empty($pprice) || empty($pquantity)) {
				
		if(empty($pname)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		
		if(empty($pdescription)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		
		if(empty($pprice)) {
			echo "<font color='red'>Product Price field is empty.</font><br/>";
		}
		if(empty($pquantity)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}		
	} else {

		//updating the table
		$sql = "UPDATE products SET pname=:pname, pdescription=:pdescription, pprice=:pprice, pquantity=:pquantity WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdescription', $pdescription);
		$query->bindparam(':pprice', $pprice);
		$query->bindparam(':pquantity', $pquantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM products WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$pname = $row['pname'];
	$pdescription = $row['pdescription'];
	$pprice = $row['pprice'];
	$pquantity = $row['pquantity'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pname" value="<?php echo $pname;?>"></td>
			</tr>
			<tr> 
				<td>Product Description</td>
				<td><input type="text" name="pdescription" value="<?php echo $pdescription;?>"></td>
			</tr>
			<tr> 
				<td>Product Price</td>
				<td><input type="text" name="pprice" value="<?php echo $pprice;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="pquantity" value="<?php echo $pquantity;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
