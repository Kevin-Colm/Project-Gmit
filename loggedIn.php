
<?php
 /* App Name: Gig Guide.
  * @Author's:
  * Kevin Gleeson
  * Colm Woodlock
  * Version: 1.0
  * Date: 18/02/2017
  *
*/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>
        <div>

            <h1>Logged in successfully</h1>
            <?php
             //adapted from https://stackoverflow.com/questions/20649921/php-redirect-on-login
                session_start();
                if (isset($_SESSION['userName'])) {
                    $username = $_SESSION['userName'];
                    $id = $_SESSION['id'];
            ?>
                   
                   <h1>Hello <?php echo $username .' ID '.$id;?></h1>
                    <h2>This is the Members Area</h2>
                    <?php include 'index.php';?>
                    <a href='logout.php'>Logout</a>
               <?php }?>
            
        </div>
    </body>
</html>


