
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

  if (isset($_POST['check'])) 
  {
  	 $uname = mysqli_real_escape_string($conn,$_POST['account']);

  	  //look the existence of the username
	  $select = "SELECT * from regestrationdata  where email == '$uname' or username == '$uname' ";

	  $query = mysqli_query($conn , $select);

	  $results = mysqli_num_rows($query);

	  if ($results > 0)
	  {
	  	echo "<script>alert('Username Found');
                window.location.href='retrievePassword.php';
          </script>";
	  }

	  else
	  {
	  	echo "<script>alert('Account Not Found!');
                window.location.href='regestrationPage.php';
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Check your username Availability</title>
</head>
<body>
	<div>
	<div id="wrapper">
		<div id="left">
			<div id="signin">
				<div class="logo">
					<img src="img/1.png" alt="Company logo">
				</div>
				<h2><center>Check If Account Is Available</center></h2>
				<form   method="POST" action="">
					<div>
						<label>Username or Email</label>
						<input type="text" name="account" class="text-input" placeholder="Enter Username or Email">
					</div>
					<button type="submit" name="check" class="primary-btn">Check User</button>
				</form>
								<br><br><br>

			
					<a href="regestrationPage.php" class="secondary-btn">Create an account</a>
				<br><br><br>
				<footer class="main-footer">
					<p>CopyRight &copy; 2019, New Tech school... All Rights Reserved</p>
					<div>
						<a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
					</div>
				</footer>
			</div>
	</div>
</body>
</html>