<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */
include 'partials/header.php';
include 'partials/home_hero.php';
if (isset($_POST['userName']) and isset($_POST['password'])) {

    $userName = $_POST['userName'];
    $password = $_POST['password'];
    //GEt tyoe from dropdown in form
    $type = $_POST['type'];
    $query = "SELECT * FROM users WHERE username = '$userName'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo 'User exists...';
    } else {
        
//If there is no PK then an insert will be ok
        $query = "Insert into users (username, userPassword) VALUES('$userName', '$password')";
       
              
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        $last_id = $conn->insert_id;
          $queryType = "insert into $type(id)VALUES('$last_id');";
                $queryType .= "INSERT INTO userType (id,type)VALUES('$last_id','$type');";
              mysqli_multi_query($conn, $queryType) or die(mysqli_error($conn));
                //Test output.
                echo "You have selected :" . $type;  // Displaying Selected Value
       header("Location: login.php");
    }
    
     
}
?>


        <form class="form-signin" method="POST">
            
            <h2 class="form-signin-heading">Please Register here</h2>
            
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="userName" class="form-control" placeholder="Username" required>
            </div>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            
            <select name="type">
                <option value="customer">Customer</option>
                <option value="band">Band</option>
                <option value="venue">Venue</option>
            </select>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <!--            <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>-->
        </form>  
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
                                        <label for="exampleFormControlSelect1">Example select</label>
                                        <select  class="form-control form-control-lg" id="exampleFormControlSelect1">
                                          <option value="customer">Customer</option>
                <option value="band">Band</option>
                <option value="venue">Venue</option>
                                        </select>
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
