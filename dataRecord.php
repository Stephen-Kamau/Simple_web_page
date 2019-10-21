<?php


//view for the whole record of regestred users 
 $host = 'localhost';
 $password = 'stiveckamash';
 $user = 'stephen';
 $db = 'webapp';



 $conn = mysqli_connect($host , $user , $password , $db);
  if (!$conn) 
  {
  	die('Connection Failed!:'.mysqli_connect_error());
  }

  //select all fields
  $select = "SELECT * from regestrationdata";
  
  //execute the statement

  $query = mysqli_query($conn , $select);
  $row = mysqli_num_rows($query);

  //array creation
  $users = [];
  while($user=mysqli_fetch_assoc($query)){
  	array_push($users,$user);
  }

?>





<!DOCTYPE html>
<html lang="eng">
<head>
	<meta name="steve">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Current Users</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="dataRecord.css">
    
</head>
<body class="bg-secondary">
	<div id="wrapper">
		<div id="left">
			<div id="signin">
				<div class="row">
					<div class="col-4"></div>
				<div class="logo mt-0 col-lg-6 col-6">
					<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
					  <a class="navbar-brand" href="#stiveckamsh@gmail.com" target="_blank">
					  	<h2><center>
					  	<!--	<img src="img/1.png" alt="Company logo"> Imekataa kucenter-->
					  	</center></h2>
					  </a>
					</nav>
				</div>
				<div class="col-2"></div>
				</div>
				<h2 class="logo"><center><img src="img/1.png" alt="Company logo"></center></h2>
			</div>
		</div>

		<!-- table section to record data -->
		<table class="table mt-3 mr-5 ml-3 pl-2">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Username</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone Number</th>
		      <th scope="col">Password</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if($row==0){ ?>
					<tr>
						<td colspan = "4">No user found</td>
					</tr>
				<?php 
			}else{
					//Loop through the users
					foreach($users as $user){ ?>
			
						<tr>
							<td><?php echo $user["id"]; ?></td>
							<td><?php echo $user["username"]; ?></td>
							<td><?php echo $user["email"]; ?></td>
							<td><?php echo $user["phone"]; ?></td>
							<td><?php echo $user["password"]; ?></td>
						</tr>
			
					<?php } } ?>
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		      <td>jhdggh,</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		      <td>jhdggh,</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Larry</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		      <td>jhdggh,</td>
		    </tr>
		  </tbody>
		</table>

	</div>			
</body>
</html>