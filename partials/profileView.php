<?php
/* App Name: Gig Guide.
     * @Author's:
     * Kevin Gleeson
     * Colm Woodlock
     * Version: 1.0
     * Date: 18/02/2017
     *
     */

//get sesssion id for access to tables pk.
//$id = $_SESSION['id'];
//get the type of registered user to innput customised content to their page.
$id = $_GET['id'];
$query = "SELECT type FROM `usertype` WHERE id = '$id';";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$row = $result->fetch_assoc();
$type = $row['type'];

//get the data from the table = to the usertype
$query1 = "SELECT * FROM `$type` WHERE id = '$id';";

$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
//Get name , image and bio if applicable.
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
    <h2>Rating: <?php echo $rating ?></h2>
    <span class="stars"><?php echo $rating ?></span>
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


<div class="col-md-4">
    <?php
    

    //TEst to try and get the venues or bands palying in the individual user page.
    $query2 = "SELECT venue.name as venueName,venue.image,band.name as bandName, event.description,event.id, event.name, event.date,event.venueId,event.bandId
    FROM ((event
    INNER JOIN band ON event.bandId = band.id)
    INNER JOIN venue ON event.venueId = venue.id)where band.id = $id;
    ";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    ?>
    <!-- Side Widget -->
    <h2>Gigs</h2>
    <div class="card my-4">
        <h5 class="card-header">Artist Shows</h5>
        <div class="card-body">
            <ul style='list-style-type: none'>
                <?php
                while ($row2 = $result2->fetch_assoc()) {
                    $name1 = $row2['name'];
                    ?>
                    <li> <?php echo $name1 ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>


</div>

