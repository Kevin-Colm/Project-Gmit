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
include 'partials/header.php';
include 'partials/home_hero.php';
//Check if the text fields are set
if (isset($_POST['username']) and isset($_POST['password'])) {
    //Place the form data into variables to put into database.
    $username = $_POST['username'];
    $password = $_POST['password'];
    //GEt  users details from the table
    $query = "SELECT username,id,userPassword FROM `users` WHERE userName='$username' and userPassword='$password'";

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
            $_SESSION['username'] = $row["username"];
            $_SESSION['id'] = $row["id"];
            $_SESSION['password'] = $row["userPassword"];
            //REdirect to loggedin page.
            //header("Location: loggedIn.php");
        }
        $id = $_SESSION['id'];
         $query = "SELECT type from userType where id= '$id'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
              
                header("location: profile.php");
        //message to print out if the table is empty (No users)
    } else {
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo "<h1 style='color:Red;'>Invalid Username or Password.</h1>";
    }
}

?>

<div id="login-overlay" class="modal-dialog modal-lg">
        
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h2 class="modal-title" id="myModalLabel">GigGuide</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="well">
                                <form id="loginForm" method="POST"  novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="username" class="control-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="e.g. joebloggs">
                                        <span class="help-block"></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember"> Remember login
                                        </label>
                                        <p class="help-block">(if this is a private computer)</p>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <p class="lead">Don't have an account?<span class="text-success">Register here!</span></p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span> See the latest gigs in your area</li>
                                <li><span class="fa fa-check text-success"></span> Promote your venue</li>
                                <li><span class="fa fa-check text-success"></span> Advertise your band</li>
                                <li><span class="fa fa-check text-success"></span> Easy to use</li>
								
                            </ul>
                            <p><a href="register.php" class="btn btn-info btn-block">Register now!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

<?php
include 'partials/footer.php';
