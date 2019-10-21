<?php
	require "connect.php";
	
	if(isset($_POST["title"])){
		$conn = new_connection();
		
		//Post variables
		$title = mysqli_real_escape_string($conn,$_POST["title"]);
		$description = mysqli_real_escape_string($conn,$_POST["description"]);
		$price = mysqli_real_escape_string($conn,$_POST["price"]);
		$stock = mysqli_real_escape_string($conn,$_POST["stock"]);
		
		//Insert statement
		//We use question marks in place of values  from users
		$sql = "INSERT INTO `products`(`title`,`description`,`price`,`stock`) VALUES(?,?,?,?)";
		
		//We now prepare the SQL statement using the connection object
		$stmt = $conn->prepare($sql);
		
		//We now have a prepared statement
		//We specify data types for the values and bind parameters in the order in the SQL statement
		//The data types and parameters should be the exact number of question marks in the string
		//'s' represents string values, 'i' -> integers, 'b'-> blobs etc
		$stmt->bind_param("ssii",$title,$description,$price,$stock);
		
		//We now execute the statement
		//This is the last statement when inserting, deleting ot updating
		//Returns true if successfully executed and false if there was an error
		if($stmt->execute()){
			header("location:index.php");
		}else{
			echo "Something went wrong";
		}
	}
 ?>