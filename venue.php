<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include 'dbConnect.php';
echo'This is the venu page<br/>';
$id = $_SESSION['id'];
$query = "SELECT * FROM `venue` WHERE id = '$id';";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
   
   
        $row = $result->fetch_assoc();
          $name = $row['name'];
          $image = $row['image'];
    
echo $name.'<br/>';
 echo'<img src="'.$row["image"].'"width="200px"/>'
         . ' <a href="logout.php">Logout</a></br>';