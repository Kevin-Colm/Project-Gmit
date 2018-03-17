
<?php
include 'dbConnect.php';
 if (isset($_SESSION['username'])) {
            //If it is set we can use the id to insert into their row in the database.
            $id = $_SESSION['id'];
            $query = "SELECT type from userType where id= '$id'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
        }
 
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
<!--<link href="css/blog-home.css" rel="stylesheet">-->

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <?php  if(!(isset($_SESSION['username']))){
               ?>
                <a class="nav-link" href="login.php">Login/Register</a>
                <?php
              }else{
                  $userName = $_SESSION['username'];
                  
                   ?>
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $row['type']?>.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $userName?></a>
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
