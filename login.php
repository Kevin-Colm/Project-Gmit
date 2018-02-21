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
session_start();
require('dbConnect.php');

//3.1 If the form is submitted
if (isset($_POST['userName']) and isset($_POST['password'])) {
    //3.1.1 Assigning posted values to variables.
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    //3.1.2 Checking the values are existing in the database or not
    $query = "SELECT username,id FROM `users` WHERE username='$userName' and password='$password'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    echo $count;
    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
     if ($count > 0) {
            // output data of each row.
            //while loop to get each row
            while ($row = $result->fetch_assoc()) {
                 $_SESSION['userName'] = $row["username"];
                 $_SESSION['id'] = $row["id"];
                 header("Location: loggedIn.php");
            }
            //message to print out if the table is empty
        }
   
       else {
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
