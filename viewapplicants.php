<?php
	error_reporting(0);
	session_start();
    require 'database.php';
    $link = mysqli_connect("localhost", "root", "tdrocks", "sms");
    $schlr_id = $_POST['sch_id1'];
    if( isset($_POST['submit']) && isset($_SESSION['admin_id1']) ){
   		$sql = "SELECT * from applicant WHERE scholarship_id = $schlr_id";
   		$result=mysqli_query($link,$sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/SMS/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<title>View Applicants</title>
</head>
<body>
	<?php if( isset($_SESSION['admin_id1']) ): ?>
	<form action = "viewapplicants.php" method = "POST" style="margin-top: 50px;">
		<label for="sch_id1"><b>Scholarship Id</b></label>
		<input type="text" placeholder="Enter Scholarship ID" name="sch_id1">
		<input type="submit" name="submit">
	</form>
	<?php if (isset($_POST['submit'])) {?>
		<center><table style="border: 3px solid #DAF7A6;border-radius: 10px;width: 70%">
		<TR style="border-bottom: 3px solid #DAF7A6; text-align: center;">
			<TH>
				<strong>Student Id</strong>
			</TH>
			<TH>
				<strong>Current CGPA</strong>
			</TH>
			<TH>
				<strong>Date</strong>
			</TH>
		</TR>
		<?php while($row = mysqli_fetch_array($result)){ ?>
		<TR style="text-align: center;">
			<TD style="border-top: 3px solid #DAF7A6;">
				<?= $row["user_id"]; ?>
			</TD>
			<TD style="border-top: 3px solid #DAF7A6;">
				<?= $row["current_cgpa"]; ?>
			</TD>
			<TD style="border-top: 3px solid #DAF7A6;">
				<?= $row["app_date"]; ?>
			</TD>
		</TR>
	<?php } ?>
	</table></center>
	<?php } ?>
	<?php else: ?>
            <?php header("Location: /SMS"); ?>
    <?php endif; ?>
</body>
</html>