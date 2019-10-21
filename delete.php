<?php
	require "connect.php";
	
	if(isset($_GET["id"])){
		$conn = new_connection();
		
		//Url Parameters
		$id = mysqli_real_escape_string($conn,$_GET["id"]);
		
		//Delete statement
		//We use question marks in place of values  from users and url parameters
		$sql = "DELETE FROM `products` WHERE `id`=?";
		
		//We now prepare the SQL statement using the connection object
		$stmt = $conn->prepare($sql);
		
		//We now have a prepared statement
		//We specify data types for the values and bind parameters in the order in the SQL statement
		//The data types and parameters should be the exact number of question marks in the string
		//'s' represents string values, 'i' -> integers, 'b'-> blobs etc
		$stmt->bind_param("i",$id);
		
		//We now execute the statement
		//This is the last statement when inserting, deleting ot updating
		//Returns true if successfully executed and false if there was an error
		if($stmt->execute()){
			header("location:".$_SERVER["HTTP_REFERER"]);
		}else{
			echo "Something went wrong";
		}
	}
 ?>