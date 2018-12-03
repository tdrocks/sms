<?php
    session_start();
    require 'database.php';

    if( isset($_SESSION['user_id']) ){

    $records = $conn->prepare('SELECT * FROM users WHERE Id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if( count($results) > 0){
        $user = $results;
    }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
        <link href="/SMS/images/favicon.ico" rel="shortcut icon">
        <title>Student Dashboard</title>
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
        <?php if( !empty($user) ): ?>
        <table>
            <tr>
                <th style="font-size:50px;">Student Dashboard</th>
            </tr>
        </table>
        <center><h2>Welcome <?php echo $user['First_Name']." ".$user['Last_Name']; ?></h2>
        <div class="container" style="text-align: left;margin: 20px 60px 20px 420px; margin-top: 50px;">
	      <h2>1. <a href="viewscholarships.php">Apply For A Scholarship</a></h2>
	      <h2>2. <a href="prev.php">View Previously Applied Scholarships</a></h2>
        </div>
        <a href="logout.php" style="margin-top: 50px;font-size: 20px;">Logout</a></center>
        <?php else: ?>
            <?php header("Location: /SMS"); ?>
        <?php endif; ?>
    </body>
</html>