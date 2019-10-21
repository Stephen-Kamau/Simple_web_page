<?php
//create connection
 $host = 'localhost';
 $password = 'stiveckamash';
 $user = 'stephen';
 $db = 'webapp';

$error = [];

 $conn = mysqli_connect($host , $user , $password , $db);
  if (!$conn) 
  {
  	die('Connection Failed!:'.mysqli_connect_error());
  }

  if (isset($_POST['change'])) 
  {

  	$uname = mysqli_real_escape_string($conn,$_POST['username']);
  	$email = mysqli_real_escape_string($conn,$_POST['email']);
  	$pass = mysqli_real_escape_string($conn,$_POST['password']);
  	$cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);

  	//check any mistakes in the data above

  	if ($pass != $cpass) 
  	{
  		array_push($error, "The Password does not match");
  	} 

  	//check the database
  	$check = "SELECT * from regestrationdata  where username = '$uname'";

  	$query = mysqli_query($conn,$check);
//check the number of rows
  	$results = mysqli_num_rows($query);

  	if ($results ==1) 
  	{
  		//create array for the results
  		$found = mysqli_fetch_array($query);

  		$db_uname = $found['username'];
  		$db_email = $found['email'];

  		if ($uname != $db_uname and $email != $db_email) 
  		{
  			array_push($error, "Please Check your Details because they do not match!");

  		}
  		else
  		{
  			if (count($error) ==0) 
  			{
  				$update ="UPDATE regestrationdata set password ='$pass' where username == '$uname' and email ='$email'";
  				$query = mysqli_query($conn , $update);
  				if ($query) 
  				{
	  		 echo "<script>alert('Password changed successfully!');
	          window.location.href='login.php';
	          </script>";
  				}
  			}
  			else
  			{
  			   	echo "<script>alert('Unexpected Error Occureed!');
                window.location.href='retrievePassword.php';
          </script>";	
  			}
  		}
  	}
  	else
  	{
  		array_push($error, "Please Check your Details because they do not exists");

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
	<title>Set New Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
	<div id="wrapper">
		<div id="left">
			<div id="signin">
				<div class="logo">
					<img src="img/1.png" alt="Company logo">
				</div>
				<h2><center>Set A new Password</center></h2>

				<form method="POST" action="">
					<div>
						<label>Username</label>
						<input name="username" type="text" class="text-input" placeholder="Enter Username">
					</div>
					<div>
						<label>Email</label>
						<input type="Email" name="email" class="text-input" placeholder="Enter email">
					</div>
					<div>
						<label>New Password</label>
						<input type="Password" name="password" class="text-input" placeholder="Enter A New password">
					</div>
					<div>
						<label>Confirm Password</label>
						<input type="password" class="text-input" placeholder="Confirm  Password" name="cpassword">
					</div>
					<button type="submit" name="change" class="primary-btn">Update</button>
				</form>
        <div class="error">
              <?php foreach ($error as $e) 
              {
                echo $e;
              } ?>
          </div>
				<label>Don't Have an Account</label>
				<a href="#" class="secondary-btn">Regester</a>
			</div><br><br><br>
			<footer class="main-footer">
				<p>CopyRight &copy; 2019, New Tech school... All Rights Reserved</p>
				<div>
					<a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
				</div>
			</footer>
		</div>

</body>
</html>