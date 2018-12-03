<?php
	session_start();
    require 'database.php';

    if( isset($_SESSION['admin_id1']) ){
    	$records = $conn->prepare('INSERT INTO scholarship(Sch_id, Sch_Name, Sch_year_eligibility, Sch_Donor, Sch_DonorEmail, Sch_Amount, active, Sch_AdminUnit) values(:sch_id,:sch_name,:sch_year,:sch_donor,:sch_donoremail,:sch_amount,:active,:sch_admin)');
    	$records->bindParam(':sch_id', $_POST['Sch_id']);
    	$records->bindParam(':sch_name', $_POST['Sch_name']);
    	$records->bindParam(':sch_year', $_POST['Sch_year_eligibility']);
    	$records->bindParam(':sch_donor', $_POST['Sch_Donor']);
    	$records->bindParam(':sch_donoremail', $_POST['Sch_DonorEmail']);
    	$records->bindParam(':sch_amount', $_POST['Sch_Amount']);
    	$records->bindParam(':active', $_POST['active']);
    	$records->bindParam(':sch_admin', $_SESSION['admin_id1']);
    	if($records->execute()){
    		header("Location: /SMS/admindashboard.php");
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<title>New Scholarship</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php if( isset($_SESSION['admin_id1']) ): ?>
	<form action = "newscholarship.php" method="POST">
		<label for="Sch_id"><b>Scholarship Id</b></label>
    	<input type="text" placeholder="Enter Scholarship ID" name="Sch_id" required>
    	<label for="Sch_name"><b>Scholarship Name</b></label>
    	<input type="text" placeholder="Enter Scholarship Name" name="Sch_name" required>
    	<label for="Sch_year_eligibility"><b>Eligible Year</b></label>
    	<input type="text" placeholder="Enter which year students are eligible" name="Sch_year_eligibility" required>
    	<label for="Sch_Donor"><b>Donor Name</b></label>
    	<input type="text" placeholder="Enter Donor Name" name="Sch_Donor" required>
    	<label for="Sch_DonorEmail"><b>Donor Email</b></label>
    	<input type="text" placeholder="Enter Donor Email" name="Sch_DonorEmail" required>
    	<label for="Sch_Amount"><b>Scholarship Amount</b></label>
    	<input type="text" placeholder="Enter Scholarship Amount" name="Sch_Amount" required>
    	<label for="active"><b>Current Active?</b></label></br>
    	<input type="radio" name="active" value="1"> Yes<br>
    	<input type="radio" name="active" value="0"> No<br>
    	<input type="submit" name="submit">
	</form>
	<?php else: ?>
            <?php header("Location: /SMS"); ?>
    <?php endif; ?>
</body>
</html>