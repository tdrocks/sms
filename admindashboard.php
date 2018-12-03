<?php
    session_start();
    require 'database.php';

    if( isset($_SESSION['admin_id1']) ){

    $records = $conn->prepare('SELECT admin_id,admin_email,admin_pass FROM admin WHERE admin_id = :id');
    $records->bindParam(':id', $_SESSION['admin_id1']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $admin = NULL;

    if( count($results) > 0){
        $admin = $results;
    }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
        <link href="/SMS/images/favicon.ico" rel="shortcut icon">
        <title>Admin Dashboard</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            td, th {
                border: 3px solid #75ff89;
                text-align: centre;
                padding: 8px;
                background-color: #75ff33;
            }

        </style>
    </head>
    <body>
        <?php if( !empty($admin) ): ?>
        <table>
            <tr>
                <th style="font-size:50px;">Admin Dashboard</th>
            </tr>
        </table>
        <center><h2>Welcome <?= $admin['admin_email']; ?></h2>
        <div class="container" style="text-align: left;margin: 20px 60px 20px 420px; margin-top: 50px;">
	      <h2>1. <a href="newscholarship.php">Add new Scholarship</a></h2>
	      <h2>2. <a href="deletescholarship.php">Delete a Scholarship</a></h2>
	      <h2>3. <a href="viewapplicants.php">View applicants for a scholarship</a></h2>
        </div>
        <a href="logout.php" style="margin-top: 50px;font-size: 20px;">Logout</a></center>
        <?php else: ?>
            <?php header("Location: /SMS/adminlogin.php"); ?>
        <?php endif; ?>
    </body>
</html>