<?php
	session_start();
	require 'database.php';

	if( isset($_SESSION['user_id']) ){
		header("Location: /SMS/userdashboard.php");
	}

	if(isset($_POST['app_submit'])){
	if(!empty($_POST['usn']) && !empty($_POST['password1'])):
	
	$records = $conn->prepare('SELECT * FROM users WHERE Id = :usn');
	$records->bindParam(':usn', $_POST['usn']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && ($_POST['password1']==$results['password'])){
		$_SESSION["user_id"] = $results["Id"];
		$_SESSION["cgpa"] = $results["Curr_cgpa"];
		header("Location: /SMS/userdashboard.php");
	} else {
		$message = 'Sorry, those credentials do not match';
		echo $message;
	}

	endif;}
?>
<!DOCTYPE html>
<html>
<head>	
	<link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<title>CMRIT Scholarship Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<center>
	<div style="float: center;">
		<div style="margin-top: 50px;">
			<h1>Student Login</br> or </br><a href="signup.php">SignUp</a></h1>
		</div>
		<div style="margin-top: 20px">
			<center>
				<div class="boxed" style="margin-top: 50px;height: 200px;">
				<form action="index.php" method="POST">	
				<input type="text" placeholder="Enter your USN" name="usn">
				<input type="password" placeholder="Enter your password" name="password1">
				<input type="submit" name="app_submit">
				</form>
				</div>
			</center>
		</div>
		<h2><a href="adminlogin.php">Admin Login</a></h2>
	</div>
	</center>
</body>
</html>