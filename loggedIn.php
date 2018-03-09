
<?php
 /* App Name: Gig Guide.
  * @Author's:
  * Kevin Gleeson
  * Colm Woodlock
  * Version: 1.0
  * Date: 18/02/2017
  *
*/
session_start();
include 'partials/header.php';

?>

    <body>
        <div>

            <h1>Logged in successfully</h1>
            <?php
             //adapted from https://stackoverflow.com/questions/20649921/php-redirect-on-login
                
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id'];
                    $password = $_SESSION['password'];
            ?>
            <h1>Test of session data from database</h1>
                   <h1>Hello <?php echo $username .' ID: '.$id . 'password: '.$password;?></h1>
                    <h2>This is the Members Area</h2>
                    
                    <a href='logout.php'>Logout</a></br>
                    <a href='createProfile.php'>Create Profile</a>
               <?php }?>
            
        </div>

<?php
include 'partials/footer.php';

