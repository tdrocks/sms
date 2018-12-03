<?php
	session_start();
	require 'database.php';

	if(isset($_SESSION['user_id'])){
		$records = $conn->prepare("SELECT * FROM scholarship JOIN applicant WHERE user_id = :user_id && scholarship_id = Sch_id");
		$records->bindParam(':user_id',$_SESSION['user_id']);
		if($records->execute()){
			echo "<link href=\"/SMS/images/favicon.ico\" rel=\"shortcut icon\">";
			echo "<center><h2 style=\"margin-top:50px;\">Previously Applied Scholarships</h2></center>";
			echo "<center><table style=\"border: 2px solid #DAF7A6; margin-top: 50px; width = 100%;\"><tr><th>Scholarship Name</th><th>Information</th><th>Date Of Application</th></tr>";

			while($row = $records->fetch(PDO::FETCH_ASSOC)){
				$timestamp = strtotime($row["sch_time"]);
				$date = date('d-m-Y', $timestamp);
				$timestamp2 = strtotime($row["app_date"]);
				$date2 = date('d-m-Y', $timestamp2);
				echo "<tr><td>".$row["Sch_name"]."</td><td><b>Donor Name:</b> ".$row["Sch_Donor"]."</br><b>Amount:</b> ".$row["Sch_Amount"]."</br><b>Date of publish:</b> ".$date."</td><td>".$date2."</td></tr>";
			}
			echo "</table></center>";
		}
	}
	else {
		header("Location: /SMS");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		td, th {
			border: solid 1px #DAF7A6;
		} 
		</style>
		<title>Previously Applied Scholarships</title>
		<link href='/SMS/images/favicon.ico' rel='shortcut icon'>
		<link rel="stylesheet" type="text/css" href="style.css">
	    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	</head>
	<body>
	</body>
</html>