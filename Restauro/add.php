<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$pname = $_POST['pname'];
	$pdescription = $_POST['pdescription'];
	$pprice = $_POST['pprice'];
	$pquantity = $_POST['pquantity'];
		
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO products(pname, pdescription, pprice, pquantity) VALUES(:pname, :pdescription, :pprice, :pquantity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdescription', $pdescription);
		$query->bindparam(':pprice', $pprice);
		$query->bindparam(':pquantity', $pquantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
