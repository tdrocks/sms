<?php
	session_start();
    require 'database.php';

    if( isset($_SESSION['admin_id1']) ){
    	if(isset($_POST['submit'])){
    	$records = $conn->prepare('UPDATE scholarship SET active=0 where Sch_id = :sch_id');
    	$records->bindParam(':sch_id', $_POST['Sch_id']);
    	if($records->execute()){
    		header("Location: /SMS/admindashboard.php");
    	}
    	}	
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<title>Delete Scholarship</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php if( isset($_SESSION['admin_id1']) ): ?>
	<form action="deletescholarship.php" method="POST" style="margin-top: 50px;">
		<label for="Sch_id"><b>Scholarship Id</b></label>
    	<input type="text" placeholder="Enter Scholarship ID to be deleted" name="Sch_id" required>
    	<input type="submit" name="submit">
	</form>
	<?php else: ?>
            <?php header("Location: /SMS"); ?>
    <?php endif; ?>
</body>
</html>