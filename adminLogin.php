<?php

//create connection
 $host = 'localhost';
 $password = 'stiveckamash';
 $user = 'stephen';
 $db = 'webapp';



 $conn = mysqli_connect($host , $user , $password , $db);
  if (!$conn) 
  {
  	die('Connection Failed!:'.mysqli_connect_error());
  }

  if (isset($_POST['submit'])) 
  {
  	 $uname = mysqli_real_escape_string($conn,$_POST['email']);
  	 $pass = mysqli_real_escape_string($conn,$_POST['password']);



  	 //check the database if the user exits
  	 $check = "SELECT * from admindb where email = '$uname'";

  	 //query the results
  	 $query = mysqli_query($conn,$check);

  	 $results = mysqli_num_rows($query);

  	 if ($results ==1) 
  	 {
  	 	$found = mysqli_fetch_array($query);

  	 	$password = $found['password'];

  	 	if ($pass == $password) 
  	 	{
  	 		echo "<script>alert('Login  successful');
                window.location.href='index.php';
          </script>";
  	 	}
  	 	else
  	 	{
  	 		echo "<script>alert('Wrong Password');
                window.location.href='adminLogin.php';
          </script>";
  	 	}
  	 }
  	 else
  	 {
  	 	echo "<script>alert('Unavailable account');
                window.location.href='adminLogin.php';
          </script>";
  	 }



  }

?>



<!DOCTYPE html>
<html lang="eng">
<head>
	<meta name="steve">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Regestration Page</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<!--<link rel="stylesheet" type="text/css" href="/root/Documents/login-page/bootstrap/css/bootstrap.css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/root/Documents/login-page/bootstrap/css/bootstrap.css/bootstrap.grid.css">
    -->
	<title>Admin Login Page!</title>
</head>
<body>
	<div class="container bg-gradient-dark">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
			  <a class="navbar-brand ml-3" href="adminLogin.php">Admin Panel For Login</a>
			</nav>
			<div>
				<h2 
				id="Admin" class="my-5 text-center text-muted display-4 pt-4 ml-3" >Admin Login</h2>
			</div>
			<div class="col-3"></div>
		<form class="col-8 pt-4 col-lg-8 col-sm col-md-10" method="POST" action="">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>

</body>
</html>