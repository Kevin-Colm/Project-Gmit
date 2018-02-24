<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */
//Adapted from http://codingcyber.org/simple-login-script-php-and-mysql-64/
//             https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//             
//import http session
session_start();
//import database connection
require('dbConnect.php');

//Check if the text fields are set
if (isset($_POST['userName']) and isset($_POST['password'])) {
    //Place the form data into variables to put into database.
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    //GEt  users details from the table
    $query = "SELECT username,id,userPassword FROM `users` WHERE userName='$userName' and userPassword='$password'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //php function to count the result rows in the query
    $count = mysqli_num_rows($result);
    // test echo $count;
    //If the value of count is greater than 0 there is a match of username and password.
    if ($count > 0) {
        // output data of each row.
        //while loop to get each row
        while ($row = $result->fetch_assoc()) {
            //store data from teh table in session state for the other pages
            $_SESSION['userName'] = $row["username"];
            $_SESSION['id'] = $row["id"];
            $_SESSION['password'] = $row["userPassword"];
            //REdirect to loggedin page.
            header("Location: loggedIn.php");
        }
        //message to print out if the table is empty (No users)
    } else {
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo "<h1 style='color:Red;'>Invalid Username or Password.</h1>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
        <form class="form-signin" method="POST">
            <h2 class="form-signin-heading">Please Login</h2>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="userName" class="form-control" placeholder="Username" required>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
        </form>   
    </body>
</html>
