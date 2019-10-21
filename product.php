<?php
	require "connect.php";
	$conn = new_connection();
	
	
	$products = [];
	
	if(isset($_GET['id'])){
		//Escape any SQL harmful string
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		//Select statement
		//We don't include the url parameter directly
		//We use a question mark, then the value shall be bound later
		$sql = "SELECT `id`,`title`,`description`,`price`,`stock` FROM `products` WHERE `id` =? LIMIT 1";
	
		//Prepare your statement
		$stmt = $conn->prepare($sql);
		
		//Bind the parameter and data type
		$stmt->bind_param("i",$id);
		
		//Execute statement
		$stmt->execute();
	
		//Bind results to variables
		$stmt->bind_result($id,$title,$description,$price,$stock);
	
		//Fetch data using fetch()
		//We use while loop to fetch multiple rows
		//For a single row, we can use an if. If no record was found, it returns false
	
		if(!$stmt->fetch()){
			echo "Product does not exist";
		}
		
	}else{
		header("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	//Updating
	if(isset($_POST["title"])){
	
	}
	
 ?>
 
 <!DOCTYPE html>
 <head>
	 <title>Fetch a single row from table</title>
	 <meta charset="UTF-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css" type="text/css"/>
	
	<style>
		.card .form-control{padding-left:0px; }
		.card .form-control:focus{box-shadow: none; outline: none}
		
	</style>
</head>
<body class = "bg-light">
	
	<div class = "container-fluid py-4 <?php if($title==null){ ?>d-none<?php } ?>">
		
		<div class = "row">
			
			<div class = "col-md-4 mx-auto">
		
				<div class = "card">
					<form action = "edit.php" method = "post">
			
						<div class = "p-3 bg-primary rounded-top text-white">
							<h6 class = "my-0">Edit Product - <?php echo $title; ?></h6>
						</div>
			
						<div class = "p-3">
				
							<div class = "form-group mb-3">
								<input type = "text" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" name = "title" placeholder = "Title" value = "<?php echo $title; ?>" required>
							</div>
							<div class = "form-group mb-3">
								<input type = "text" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" name = "description" placeholder = "Description" value = "<?php echo $description; ?>" required>
							</div>
					
							<div class = "form-group mb-3">
								<input type = "number" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" placeholder = "Price" name = "price" min = "0" value = "<?php echo $price; ?>" required>
							</div>
					
							<div class = "form-group">
								<input type = "number" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" placeholder = "Units in Stock" name = "stock" min = "0" value = "<?php echo $stock; ?>" required>
							</div>
							
							<!--Product id-->
							<input type = "hidden" name = "id" value = "<?php echo $id; ?>">
					
						</div>
				
						<div class = "px-3 py-2 border-top text-right">
							<button type = "submit" class = "btn btn-success ml-3">Update</button>
						</div>
				
					</form>
				</div>
		
			</div>
		
		</div>
	
	</div>
	
</body>
</html>