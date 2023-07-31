<?php
if(isset($_POST['postTitle'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to the database failed due to".mysqli_connect_error());

    }

    $postTitle = $_POST['postTitle'];
    $postDetails = $_POST['postDetails'];
    $postImage = $_POST['postImage'];
    // echo "Success connecting to the db"
    $sql = "INSERT INTO `blog`.`posts` ( `postTitle`, `postContent`, `postImage`, `postDate`) VALUES ('$postTitle', '$postDetails', '$postImage', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        echo "Succesfully inserted";
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
    <title>Add New Post</title>
</head>
<body>
    <div class="addpost">
        <h1>Add Post</h1>
        <form action="add-post.php" method="POST">
            <input type="text" name="postTitle" id="postTitle" placeholder="Enter The Title">
            <br>
            <br>
            <textarea name="postDetails" id="postDetails" cols="30" rows="10" placeholder="Enter the post details"></textarea>
            <br>
            <br>
            <input type="text" name="postImage" id="postImage" placeholder="Link for the supporting image">
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>

