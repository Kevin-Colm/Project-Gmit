<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//echo'This is the customers page<br/>';
//$id = $_SESSION['id'];
//$query = "SELECT * FROM `customer` WHERE id = '$id';";
//
//    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//    
//   
//   
//        $row = $result->fetch_assoc();
//          $name = $row['name'];
//          $image = $row['image'];
//    
//echo '<h1>'.$name.'<h1/>';
////@ToDo If user is registered allow to update photo it can be null so need ot handle that.
// echo'<img src="'.$row["image"].'"width="200px"/>';

session_start();
include 'partials/header.php';
 include 'partials/profile.php';
 include 'partials/footer.php';
       