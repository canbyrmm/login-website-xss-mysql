<?php 

session_start();

	include("connection.php");
	include("functions.php");

	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
	
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password!";
		}else
		{
			echo "Wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
 
<link href="style.css" type="text/css" rel="stylesheet"/>
    
	<div id="box">
		
		<form method="post">
			<div 
			style="
			font-family: 'Exo', sans-serif;
			font-size: 20px;
			margin: 25px;
			color: white;">
			Login Page
		</div>

			<input id="text" type="text" placeholder="name" name="user_name"><br><br>
			<input id="text" type="password" placeholder="password"  name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Signup</a><br><br>
		</form>
	</div>
</body>
</html>