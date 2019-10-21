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

$error=[];
//database entry and populating

  if (isset($_POST['signup']))
  {

  	//filter the data and create variables to hold them
  	$username = mysqli_real_escape_string($conn,$_POST['username']);
  	$email = mysqli_real_escape_string($conn,$_POST['email']);
  	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
  	$password = mysqli_real_escape_string($conn,$_POST['password']);
  	$password1 = mysqli_real_escape_string($conn,$_POST['password1']);

  	//check if the values are empty
  	if (empty($username)) 
  	{
  	    array_push($error, "<p> Please enter your username</p>");
  	}
  	elseif (empty($email)) 
  	{
  	    array_push($error,"<p> Please enter your email</p>");
  	}
  	elseif (empty($phone)) 
  	{
  	    array_push($error,"<p> Please enter your phone number</p>");
  	}
  	elseif (empty($password)) 
  	{
  	    array_push($error,"<p> Please enter your password</p>");
  	}
  	elseif (empty($password1)) 
  	{
  	    array_push($error,"<p> Please confirm your password</p>");
  	}


  	//check the length of password and confirm;;
  	if (strlen($username ) < 5) 
  	{
  		array_push($error,"<p>Your username must be more then seven characters long</p>");
  	}

  	if ($password != $password1) 
  	{
  		array_push($error,"<p>Password does not much</p>");
  	}
  	  //post the data to the db if the conditions are satisfied


  	//encript password
  	$password = password_hash($password ,PASSWORD_DEFAULT);
  
  //check if the email or username has been already been used
  	$select = "SELECT * from regestrationdata
 where username = '$username' or email = '$email'";
  	$result = mysqli_query($conn , $select);
  	//returns all rows from the database
  	$numRow = mysqli_num_rows($result);
  	if ($numRow > 0) 
  	{
  		array_push($error,"Username or email Already Exists");
  		//direct user to the regestration page
  		//header("Location :regestrationPage.php");
  	}

  	else
  	{
      if(count($error)==0){

    		//insert data
    		$data = "INSERT into regestrationdata (username , email ,phone ,password) VALUES ('$username' ,'$email' ,'$phone' , '$password')";

    		$insert = mysqli_query($conn , $data);

    		if ($insert) 
    		{
    			echo "<script>alert('Regestration successful');
                window.location.href='homepage.php';
          </script>";
    		}
        else
        {
          echo "<script>alert('Error');</script>";
        }

      }
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
	<link rel="stylesheet" type="text/css" href="style.css">
  
  <style type="text/css">
    
  </style>
</head>
<body>
	<div id="wrapper">
		<div id="left">
			<div id="signin">
				<div class="logo">
					<img src="img/1.png" alt="Company logo">
				</div>
        <header>
				<h2><center>Regester with Us</center></h2>
        </header>
        <div class="form">
                  <form method="POST" action="" autocomplete="off">
          <div class="error">
              <?php foreach ($error as $e) {
                echo $e;
              } ?>
          </div>

          <div>
            <label>Username</label>
            <input type="text" name="username" class="text-input" placeholder="Enter Username" <?php if (isset($_POST['username'])){ ?>value="<?php echo $_POST['username']; ?>"<?php } ?>
            
          </div>
          <div>
            <label>Email</label>
            <input type="Email" class="text-input" name="email" placeholder="Enter email">
          </div>
          <div>
            <label>Phone NO.</label>
            <input type="number" class="text-input" name="phone" placeholder="Enter Phone Number">
          </div>
          <div>
            <label>password</label>
            <input type="password" class="text-input" name="password" placeholder="Enter Password">
          </div>
          <div>
            <label>password</label>
            <input type="password" class="text-input" name="password1" placeholder="Enter Password">
          </div>
          <button type="submit" name="signup" class="primary-btn">Sign up</button>
        </form>

        </div>
        <br>
        <br>
        <br>
        <br>
				<label>Have an Account already</label>
				<a href="login.php" class="secondary-btn">Sign In</a>
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