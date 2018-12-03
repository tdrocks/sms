<?php
	session_start();
	require 'database.php';
	if(isset($_SESSION["user_id"])){
	$records = $conn->prepare('INSERT INTO applicant(user_id,scholarship_id,current_cgpa) VALUES (:id,:sch_id,:curr_cgpa)');
	$records->bindParam(':id',$_SESSION["user_id"]);
	$records->bindParam(':sch_id',$_GET['id']);
	$records->bindParam(':curr_cgpa',$_SESSION["cgpa"]);
	$message = '';
	if($records->execute()){
			header("Location: /SMS/userdashboard.php");
			echo "Applied Successfully";
	}
	else{
		print("Already");
		header("Location: /SMS/viewscholarships.php?already=1");
	}
	}
	else{
		header("Location: /SMS");
	}
?>