<?php
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to the database failed due to".mysqli_connect_error());

    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo "Success connecting to the db"
    $sql = "INSERT INTO `blog`.`signup_login` (`userid`, `name`, `username`, `email`, `password`) VALUES (NULL, '$name', '$username', '$email', MD5('$password'));";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Succesfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
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
<div class="login"><h1>SignUp Page</h1>
    <form action="signup.php" method="POST">
        <!-- <input type="text" name="username" id="username" placeholder="Username"> -->
        <input type="text" name="name" id="name" placeholder="Enter Full Name">
        <br>
        <input type="text" name="username" id="username" placeholder="Enter Username">
        <br>
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <br>
        <input type="password" name="password" id="password" placeholder="Password">
        <br>
        <input type="submit">
    </form>
    <h4>Have an account? <a href="./index.php">Login Here</a>        
    </div>
    
</body>
</html>