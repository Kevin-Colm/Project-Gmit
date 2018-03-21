
<?php 
//get sesssino id for access to tables pk.
$id = $_SESSION['id'];
//get the type of registered user to innput customised content to their page.

$query = "SELECT type FROM `usertype` WHERE id = '$id';";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   
        $row = $result->fetch_assoc();
        $type = $row['type'];
        
        
        switch ($type) {
    case 'venue':
        include 'venueProfile.php';
                break;
    case 'band':
        include 'bandProfile.php';
        
        break;
    case 'customer':
        
        include 'customerProfile.php';
        break;
    default:
        break;
}

 
