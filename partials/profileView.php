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

<!-- Post Content Column -->
<div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4"><?php echo $type ?> Profile</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#"><?php echo $name ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on January 1, 2018 at 12:00 PM</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="<?php echo $image ?>" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?php echo $bio ?></p>


    <hr>


</div>



