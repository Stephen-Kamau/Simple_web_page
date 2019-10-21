<?php
$host = 'localhost';
$password = 'stiveckamash';
$user = 'stephen';
$db = 'webapp';



$conn = mysqli_connect($host , $user , $password , $db);
 if (!$conn) 
 {
 	die('Connection Failed!:'.mysqli_connect_error());
 }


 if (isset($_POST['login'])) 
 {
       $user = mysqli_real_escape_string($conn,$_POST['username']);
       $pass = mysqli_real_escape_string($conn,$_POST['password']);

      //check if username is found

       $check = "SELECT * from regestrationdata  where username = '$user' ";

       //query the results
       $results = mysqli_query($conn , $check);

       //create the record rows
       $row =mysqli_num_rows($results);


       //check number of rows to be one
       if ($row == 1) 
       {
       	//return the row
       	//the fetch returns rows in array form
       	$found = mysqli_fetch_array($results);

       	//get password from the array
       	$dbpass = $found['password'];

       	//verify password with the username in the row

       	if ($pass == $dbpass) 
       	{ 
       		echo "<script>alert('Login  successful');
                window.location.href='homepage.html';
          </script>";

       	}
       	else
       	{
       		echo "<script>alert('Wrong Password')
       		window.location.href='login.php'</script>";
       	}

       }

       else
       {
       	  echo "<script>alert('No username Found')
       	  window.location.href='regestrationPage.php</script>";
       }



 }






?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="steve">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
	<title>LOGIN PAGE</title>

</head>
<body>
	<div id="wrapper">
		<div id="left">
			<div id="signin">
				<div class="logo">
					<img src="img/1.png" alt="Company logo">
				</div>
				<h2><center>Login To Access Us</center></h2>

				<form method="POST" action="" autocomplete="off">
					<div>
						<label>Username</label>
						<input type="text" name="username" class="text-input" placeholder="Enter Username">
					</div>
					<div>
						<label>password</label>
						<input type="password" name="password" class="text-input" placeholder="Enter Password">
					</div>
					<button type="submit" class="primary-btn" name="login">Sign in</button>
				</form>
				<div class="links">
					<a href="#">Forget Password</a>
					<a href="checkUserName.php">Click Here</a>
				</div>
				<div class="or">
					<hr class="bar">
					<span>OR</span>
					<hr class="bar">
				</div>
				<a href="regestrationPage.php" class="secondary-btn">Create an account</a>
			</div><br><br><br>
			<footer class="main-footer">
				<p>CopyRight &copy; 2019, New Tech school... All Rights Reserved</p>
				<div>
					<a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
				</div>
			</footer>
		</div>
		<div id="right">
			<div id="showcase">
				<div class="showcase-content">
					<h1 class="showcase-text">Let's create the future <strong>Together</strong></h1>
					<a href="#" class="secondary-btn">Start by visiting us to see what we have</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>