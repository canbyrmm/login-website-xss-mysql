<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>CAN</title>

	<style>
        *{
            background-color:cadetblue;
        }
    </style>
</head>

<body>

	<a href="logout.php">Logout</a>
	<br>
	<h2>WELCOME, <?php echo htmlspecialchars( $user_data['user_name']); ?>!</h2>
</body>
</html>