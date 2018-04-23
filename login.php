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

if(isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id = 0;
    
    //Prepared statment for login inputs
    $stmt = $conn->prepare("SELECT id, username, userPassword FROM users WHERE username=? AND userPassword=? LIMIT 1");
    //Bind post username and password to the prepared statement.
    $stmt->bind_param('ss', $username, $password);
    //Run Statement
    $stmt->execute();
    //Get result set.
    $stmt->bind_result($user_id,$username, $password);
    //Store result set into variable
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {   
                //Store the username and id from database into the global session variables.
                //Can then be used to show custom views to the user.
                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                //Query to get the data from the  user type table to display content 
                //depending the type of account the user has.        
                $query = "SELECT type from userType where id= '$user_id'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                //Redirect to the profile page if login success
                header("location: profile.php");
                exit();
        
           }

    }
    else {
       //If the login credentials doesn't match, he will be shown with an error message.
        echo "<h1 style='color:Red;'>Invalid Username or Password.</h1>";
    }
    //Close the statement
    $stmt->close();
}
//Close the database connection.
$conn->close();

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
                                    <button type="submit"class="btn btn-success btn-block">Login</button>
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
