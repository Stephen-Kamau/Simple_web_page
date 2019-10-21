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
<html>
<head>
	<title>HOME PAGE</title>
	<meta charset="UTF-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="homepage.css">

</head>
<body >
	<div><h3>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary   mb-3">
		  <a class="navbar-brand order-1 mr-1.5 mt-1.5" href="logout.php">LOG OUT</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item active nav-link h3 columnspan=3 " href="#Home">Home</a>
		      <a class="nav-item nav-link h3" href="#contacts">Contacts</a>
		      <a class="nav-item nav-link h3 " href="adminLogin.php">Admin login</a>
		    </div>
		  </div>
		</nav>
		</h3>
		<!--/navbar-->

						<?php if(count($products)==0){ ?>
					<tr>
						<td colspan = "4">No products found</td>
					</tr>
				<?php }else{
					//Loop through the products
					foreach($products as $product){ ?>
						<div class="col-4 pt-1.5">
									<div class="card row"  style="">
									  <div class="card-header">
									    <h3>Title:<?php echo $product["title"]; ?></h3>
									  </div>
									  <ul class="list-group list-group-flush">
									    <li class="list-group-item">Description:<p><?php echo $product["description"]; ?></p></li>
									    <li class="list-group-item ">Stock :<p><a href=""><?php echo $product["stock"]; ?></p></a></li>
									    <li class="list-group-item">Price :<p><a href=""><?php echo $product["price"]; ?></p></a></li>
									  </ul>
									</div>
									</div>
							    
							<?php } }?>
						
                 </div>
            </div>
			</div>
			
		</div>

    </div>


</body>
</html>