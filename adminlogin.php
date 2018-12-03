<?php
	session_start();

	if( isset($_SESSION['admin_id1']) ){
		header("Location: /SMS/admindashboard.php");
	}

	require 'database.php';
	if(isset($_POST['admin_submit'])){
	if(!empty($_POST['admin_id']) && !empty($_POST['password2'])):
	$records = $conn->prepare('SELECT * FROM admin WHERE admin_id = :admin_id1');
	$records->bindParam(':admin_id1', $_POST['admin_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';

	if(count($results) > 0 && ($_POST['password2']==$results['admin_pass'])){
		$_SESSION['admin_id1'] = $results['admin_id'];
		$_SESSION['admin_email1'] = $results['admin_email'];
		$message = 'Welcome Admin!';
		header("Location: /SMS/admindashboard.php");
		echo $message;
	} else {
		$message = 'Sorry, those credentials do not match';
		echo $message;
	}
	endif;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<title>Admin Login Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<center>
	<div style="margin-top: 30px;">
			<h1>Admin Login</h1>
	</div>
	<div style="margin-top: 20px">
				<center>
				<div class="boxed" style="margin-top: 50px;height: 200px;">
				<form action="adminlogin.php" method="POST">	
				<input type="text" placeholder="Enter your ID" name="admin_id">
				<input type="password" placeholder="Enter your password" name="password2">
				<input type="submit" name="admin_submit">
				</form>
				</div>
				</center>
	</div>
	</center>
</body>
</html>