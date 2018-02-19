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
    //3.1.1 Assigning posted values to variables.
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    //3.1.2 Checking the values are existing in the database or not
    $query = "Insert into users (username, password) VALUES($userName,  $password)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result){
            echo 'USer added!!';
        }else{
            echo 'registration failed...';
        }
        }

