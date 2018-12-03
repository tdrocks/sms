<?php
	error_reporting(0);
	session_start();
	require 'database.php';
	if(isset($_SESSION['user_id'])){
	$link = mysqli_connect("localhost", "root", "tdrocks", "sms");
	$sql = "SELECT * FROM scholarship";
	$result = mysqli_query($link,$sql);
	if($result->num_rows >0){
		echo "<link href=\"/SMS/images/favicon.ico\" rel=\"shortcut icon\">";
		echo "<center><h2 style=\"margin-top:50px;\">Available Scholarships</h2></center>";
		echo "<center><table style=\"border: 2px solid #DAF7A6; margin-top: 50px;\"><tr><th>Scholarship Name</th><th>Information</th><th>Criteria</th><th>Apply</th></tr>";
		while ($row = $result->fetch_assoc()) {
			$timestamp = strtotime($row["sch_time"]);
			$date = date('d-m-Y', $timestamp);
			if($row["active"] == 1){
				echo "<tr><td>".$row["Sch_name"]."</td><td><b>Donor Name:</b> ".$row["Sch_Donor"]."</br><b>Amount:</b> ".$row["Sch_Amount"]."</br><b>Date of publish:</b> ".$date."</td><td>For ".$row["Sch_year_eligibility"]."th Year Students</td><td><a href=\"apply.php?id=".$row['Sch_id']."\">Apply Now!</a></td></tr>";
			}
		}
		echo "</table></center>";
	}
	}
	else{
		header("Location: /SMS");
	}
	$already = $_GET['already'];
	if($already == 1){
		echo "<h3 style=\"margin-top:30px;\">Already Applied!</h3>";
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
	<link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<title>View Scholarships</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
</body>
</html>