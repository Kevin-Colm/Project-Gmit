
<?php
//The database connection. can be included anywhere that is needed.
include 'dbConnect.php';
//IF session.start() is used on another page and this header is included in that file the user id can be used to 
// Query there own data in the database.
if (isset($_SESSION['username'])) {
    //If it is set we can use the id to insert into their row in the database.
    $id = $_SESSION['id'];
    $query = "SELECT type from userType where id= '$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}
?>

<!--
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */-->

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gig Guide</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom styles for this template -->
        <link href="css/BGImage.css" rel="stylesheet" type="text/css"/>

        <!--Added a favicon for the website this is the little logo showin on the tab --> 
        <link rel="shortcut icon" type="image/png" href="./Images/favicon.png"/>


    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="index.php"><img src="./Images/GigGuide Logo.png" height="50" alt=""/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pastEvent.php">Past Events</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            //If the userName is not set Show the login menue item
                            if (!(isset($_SESSION['username']))) {
                                ?>
                                <a class="nav-link" href="login.php">Login/Register</a>
                                <?php
                            } else {
                                //Otherwise show the user name i its place with a link to the user profile
                                $userName = $_SESSION['username'];
                                ?>
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="Profile.php"><?php echo $userName ?></a>
                            </li>

    <?php
}
?>             


                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">
