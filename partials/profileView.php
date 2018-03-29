<?php
//get sesssino id for access to tables pk.
//$id = $_SESSION['id'];
//get the type of registered user to innput customised content to their page.
$id = $_GET['id'];
$query = "SELECT type FROM `usertype` WHERE id = '$id';";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   
        $row = $result->fetch_assoc();
        $type = $row['type'];
        
       
$query1 = "SELECT * FROM `$type` WHERE id = '$id';";

    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
   
        $row1 = $result1->fetch_assoc();
        $name = $row1['name'];
        $image = $row1['image'];
        $bio = $row1['bio'];
        $rating = $row1['rating'];
       ?>

<?php echo'<h2>'. $name.'</h2>';
echo '<h2>'. $bio.'</h2>';
        echo '<h2>'. $rating.'</h2>';?>
        <image src="<?php echo $image; ?>" alt="img"/>
        
        

