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
if($type=='venue'){
$address = $row1['address'];
}//End if
$image = $row1['image'];
$bio = $row1['bio'];

$rating = $row1['rating'];
?>

<!-- Post Content Column -->
<div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4"><?php echo strtoupper($type) .": ". $name ?></h1>
    <?php if($type == 'venue'){
        ?>
    <h3 class="mt-4"><?php echo  $address ?></h3>
    <?php 
    }//End IF
    if($rating==0){
                    echo '<h2>'.strtoupper($type).' Not rated yet.</h2>';  
    } //End IF
    else{?>
        <h2>Rating: <?php echo $rating ?></h2>
        <span class="stars"><?php echo $rating ?></span>
    <?php 
    
    }//End else?>
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
    INNER JOIN venue ON event.venueId = venue.id)where ". $type . "id = $id;
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
                    $date = $row2['date'];
                    $eventId = $row2['id'];
                    $venueName = $row2['venueName'];
                    $bandName = $row2['bandName'];
                    ?>
              
                    <li> <?php 
                      if($type=="band"){
                          echo '<a href="singleEvent.php?id='.$eventId.'">'.$date." @".$venueName.'</a>';
                        }////End IF
                        else{
                              echo '<a href="singleEvent.php?id='.$eventId.'">'.$date." @".$bandName.'</a>';
                            }//End else 
                        ?></li>
                        
                    
                <?php }//End While ?>
            </ul>
        </div>
    </div>
</div>

