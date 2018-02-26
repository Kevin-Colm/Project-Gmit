<?php
/* App Name: Gig Guide.
  * @Author's:
  * Kevin Gleeson
  * Colm Woodlock
  * Version: 1.0
  * Date: 18/02/2017
  *
*/
include('dbConnect.php');

if (isset($_POST['userName']) and isset($_POST['password'])) {
   
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = '$userName'";
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
        if($count > 0){
            echo 'User exists...';
            
        }else{
            $query = "Insert into users (username, userPassword) VALUES('$userName', '$password')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: login.php");
        }
        }
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
        <form class="form-signin" method="POST">
            <h2 class="form-signin-heading">Please Register here</h2>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="userName" class="form-control" placeholder="Username" required>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
<!--            <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>-->
        </form>   
    </body>
</html>
