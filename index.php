<?php
if(isset($_POST['loginName']) && isset($_POST['loginPassword'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "blog"; 

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("connection to the database failed due to".mysqli_connect_error());
    }

    $Lusername = $_POST['loginName'];
    $Lpassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM `signup_login` WHERE `username` = ? AND `password` = MD5(?)";

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "ss", $Lusername, $Lpassword);


        mysqli_stmt_execute($stmt);


        mysqli_stmt_store_result($stmt);


        if (mysqli_stmt_num_rows($stmt) == 1) {
            echo "Login successful";
            header("Location: dashboard.php");
            exit();

        } else {
            echo "Invalid username or password";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Unable to execute query";
    }

    $con->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogX</title>
</head>
<body>
    <div class="login"><h1>LOGIN PAGE</h1>
    <form action="index.php" method="POST">
     
        <input type="text" name="loginName" id="loginName" placeholder="Username">
        <br>
        <input type="password" name="loginPassword" id="loginPassword" placeholder="Password">
        <br>
        <input type="submit">
    </form>
    <h3>Do not have an account? <a href="./signup.php">Signup Now!!</a>
        
    </div>
    
</body>
</html>


