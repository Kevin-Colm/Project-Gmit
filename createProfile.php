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
//Include database connecction
include 'dbConnect.php';



//Check if username is assigned in the sessiion
if (isset($_SESSION['username'])) {
    //If it is set we can use the id to insert into their row in the database.
    $id = $_SESSION['id'];
}

//Check if the submit post http request has been set
if (isset($_POST['submit'])) {
    //Get name from the form
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $bio = mysqli_real_escape_string($conn,$_POST['bio']);
    $target_dir = "Images/";
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {

        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //SQL auery to check if the ID PK exists
    $query = "SELECT * FROM userType WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //php function to count the matching rows in the table
    $count = mysqli_num_rows($result);
    //IF count is greater than 0 the pk exists so execute an updte rather than an insert.
    if ($count > 0) {
        $row = $result->fetch_assoc();
        $type = $row['type'];
        if ($type == 'venue') {
            //COALESCE sql function ignores an empty string if it is sent by the form.
            $query = "UPDATE $type SET name = COALESCE(NULLIF( '$name',''),name),"
                    . "image = COALESCE(NULLIF( '$target_file','Images/'),image),"
                    . "address = COALESCE(NULLIF( '$address',''),address),"
                    . "bio = COALESCE(NULLIF( '$bio',''),bio) WHERE id=$id;";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else{
            //COALESCE sql function ignores an empty string if it is sent by the form.
            $query = "UPDATE $type SET name = COALESCE(NULLIF( '$name',''),name),"
                    . "image = COALESCE(NULLIF( '$target_file','Images/'),image),"
                    . "bio = COALESCE(NULLIF( '$bio',''),bio) WHERE id=$id;";
            
            
            }
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        header("location: profile.php");
    }
}
                     



       

     
            
        




      
