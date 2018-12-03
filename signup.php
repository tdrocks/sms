<?php
    require 'database.php';
    if(isset($_POST['submit'])){
    $records = $conn->prepare('INSERT INTO users(Id, password, Curr_Year, First_Name, Last_Name, App_Gender, App_Email, App_Address, App_City, App_State,App_zipcode) values (:usn,:password,:year,:fname,:lname,:gender,:email,:add,:city,:state,:code)');
    $records->bindParam(':usn', $_POST['usn']);
    $records->bindParam(':password', $_POST['password']);
    $records->bindParam(':year', $_POST['year']);
    $records->bindParam(':fname', $_POST['firstname']);
    $records->bindParam(':lname', $_POST['lastname']);
    $records->bindParam(':gender', $_POST['gender']);
    $records->bindParam(':email', $_POST['email']);
    $records->bindParam(':add', $_POST['address']);
    $records->bindParam(':city', $_POST['city']);
    $records->bindParam(':state', $_POST['state']);
    $records->bindParam(':code', $_POST['zip']);
    
    if($records->execute()){
        echo "Registration Successful";
        header("Location: /SMS");
    } else {
        $message = 'Something went wrong!';
        echo "<center><h1>".$message."</h1></center>";
    }
    }
?>
<!DOCTYPE html>
<html>
<head>  <link href="/SMS/images/favicon.ico" rel="shortcut icon">
        <title>Sign Up</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}


/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}


.container {
    padding: 14px;
    margin: 20px 60px 20px 60px;

}
}
</style>
</head>
<body>

<form action="signup.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="firstname" required>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="lastname" required>

    <label for="gender"><b>Gender</b></label><br>
    <input type="radio" name="gender" value="M"> Male<br>
    <input type="radio" name="gender" value="F"> Female<br>
    <br>

    <label for="year"><b>Present Year</b></label>
    <input type="text" placeholder="Enter the year you are in" name="year" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter your address" name="address" required>

    <label for="city"><b>City</b></label>
    <input type="text" placeholder="Enter City name" name="city" required>

    <label for="state"><b>State</b></label>
    <input type="text" placeholder="Enter state name" name="state" required>

    <label for="zip"><b>Zip Code</b></label>
    <input type="text" placeholder="Enter Zip Code" name="zip" required>

    <label for="usn"><b>Student USN</b></label>
    <input type="text" placeholder="Enter USN" name="usn" required>

    <label for="email"><b>College Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <center>
    <input type="submit" name="submit" value="Sign Up">
    </center>
  </div>
</form>

</body>
</html>