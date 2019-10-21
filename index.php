<?php
	require "connect.php";
	$conn = new_connection();
	
	
	$products = [];
	
	if(isset($_GET['keyword'])){
		//Escape any SQL harmful string
		$keyword = mysqli_real_escape_string($conn,$_GET['keyword']);
		//Select statement
		//We don't include the search keyword directly
		//We use a question mark, then the value shall be bound later
		$sql = "SELECT `id`,`title`,`description`,`price`,`stock` FROM `products` WHERE `title` LIKE ?";
	
		//Prepare your statement
		$stmt = $conn->prepare($sql);
		
		//Bind the parameter and data type
		$stmt->bind_param("s",$keyword);
	}else{
		//Select statement
		$sql = "SELECT `id`,`description`,`title`,`price`,`stock` FROM `products`";
	
		//Prepare your statement
		$stmt = $conn->prepare($sql);
	}
	
	//Execute statement
	$stmt->execute();
	
	//Bind results to variables
	$stmt->bind_result($id,$title,$description,$price,$stock);
	
	//Fetch data
	//We use while loop to fetch all rows and if to fetch a single row
	$products=[];
	
	while($stmt->fetch()){
		//Every loop will contain a single row, where the column values can be accessed through the variables we bound to the result
		
		//We can use an associative array to hold values of each column
		$product = [
			"id"=>$id,
			"title"=>$title,
			"description"=>$description,
			"price"=>$price,
			"stock"=>$stock
		];
		
		//Let's add the product to the array
		array_push($products,$product);
	}
 ?>
 
 <!DOCTYPE html>
 <head>
	 <title>Fetch multiple rows from table</title>
	 <meta charset="UTF-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css" type="text/css"/>
	
	<style>
		.card .form-control{padding-left:0px; }
		.card .form-control:focus{box-shadow: none; outline: none}
		.form-control[type = search]:focus{box-shadow: none; outline: none; border-color: auto}
		td{border:1px solid #ddd}
		
	</style>
</head>
<body class = "bg-light">
	
	<div class = "container-fluid py-4">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
		  <a class="navbar-brand ml-3" href="dataRecord.php">Access Users</a>
		</nav>
		<h5>My Products</h5>
		
		<div class = "row">
		
			<div class = "col-md-7">
			
				<div class = "mb-3">
					<form action = "" method = "get">
			
						<div class = "input-group rounded border">
							<input type = "search" class = "form-control search rounded-left border-0" name = "keyword" placeholder = "Search for Products..." <?php if(isset($_GET['keyword'])){ ?>value = "<?php echo $_GET['keyword']; ?>"<?php } ?> required>
							<div class = "input-group-prepend">
								<button class = "btn btn-primary border-0 rounded-right">Go</button>
							</div>
						</div>
			
					</form>
				</div>
				
				<!--Lets output the products in a table-->
				
				<table class = "table border table-striped bg-white">
			
					<tr class = "bg-success text-white">
						<th>Title</th>
						<th>Description</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Action</th>
					</tr>
		
				<?php if(count($products)==0){ ?>
					<tr>
						<td colspan = "4">No products found</td>
					</tr>
				<?php }else{
					//Loop through the products
					foreach($products as $product){ ?>
			
						<tr>
							<td><?php echo $product["title"]; ?></td>
							<td><?php echo $product["description"]; ?></td>
							<td><?php echo $product["price"]; ?></td>
							<td><?php echo $product["stock"]; ?></td>
							<td>
								<a href = "product.php?id=<?php echo $product['id']; ?>" class = "d-inline-block">Edit</a>
						
								<a href = "delete.php?id=<?php echo $product['id']; ?>" class = "ml-2btn btn-sm btn-danger">&times;</a>
					
							</td>
						</tr>
			
					<?php } } ?>
				</table>
				
			</div>
			
			<!--New Item-->
			
			<div class = "col-md-4">
		
				<div class = "card">
					<form action = "insert.php" method = "post">
			
						<div class = "p-3 bg-primary rounded-top text-white">
							<h6 class = "my-0">New Product</h6>
						</div>
			
						<div class = "p-3">
				
							<div class = "form-group mb-3">
								<input type = "text" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" name = "title" placeholder = "Title" required>
							</div>
							<div class = "form-group mb-3">
								<input type = "text" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" name = "description" placeholder = "Description" required>
							</div>
					
							<div class = "form-group mb-3">
								<input type = "number" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" placeholder = "Price" name = "price" min = "0" required>
							</div>
					
							<div class = "form-group">
								<input type = "number" class = "form-control rounded-0 border-top-0 border-left-0 border-right-0" placeholder = "Units in Stock" name = "stock" min = "0" required>
							</div>
					
						</div>
				
						<div class = "px-3 py-2 border-top text-right">
							<button type = "reset" class = "btn btn-link p-0">Reset</button>
					
							<button type = "submit" class = "btn btn-success ml-3">Submit</button>
						</div>
				
					</form>
				</div>
		
			</div>
		
		</div>
	
	</div>
	
</body>
</html>