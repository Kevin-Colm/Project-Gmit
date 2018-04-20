<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */

//Inner join to get all badn, venue and event data for the gig list on the home page.
$query = "SELECT venue.name as venueName,band.image,band.name as bandName, event.description,event.id, event.name, event.date,event.venueId,event.bandId
FROM event
INNER JOIN band ON event.bandId = band.id
INNER JOIN venue ON event.venueId = venue.id
 WHERE event.date >= DATE(NOW());
";
?>


<div class="col-md-8">
    <h2>Upcoming Gigs</h2>
<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//While loop to get each matching row from each table in the inner join
while ($row = $result->fetch_assoc()) {
    $desc = $row['description'];
    $date = $row['date'];
    $name = $row['name'];
    $venueName = $row['venueName'];
    $image = $row['image'];
    $venueId = $row['venueId'];
    $bandId = $row['bandId'];
    $bandName = $row['bandName'];
    $eventId = $row['id'];

   
        ?>
            <!-- Blog Post -->
            <div class="card mb-4">

                <div class="card-body">
                    
                   
  <div class="card-footer text-muted">
                                    <h4>Date: <?php echo $date ?></h4> 
                    <h5>Live At: <a href=" singleProfile.php?id=<?php echo $venueId ?>"><?php echo $venueName ?></a></h5>
                        </div>
                      
                    <div class="row">
                      
                        <div class="col-md-7">
                    
                            <a href="singleProfile.php?id=<?php echo $bandId ?>">
                                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $image ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h2 class="card-title"><?php echo $name ?></h2>
                          

                            <p class="card-text"><?php echo $desc ?></p>

                            <a href="singleEvent.php?id=<?php echo $eventId ?>" class="btn btn-primary">Read More &rarr;</a>

                        </div>
                        
                       
                    </div>
                    <div class="card-footer text-muted">
                            
                              <a href="singleProfile.php?id=<?php echo $bandId ?>"><?php echo $bandName ?></a>
                        </div>
                </div>
                <!-- /.row -->



            </div>

    <?php }

?>
</div>
<div class="col-md-4">




    <!-- Side Widget -->
    <h2>Ranking</h2>
    <div class="card my-4">
        <h5 class="card-header">Top 3 Bands</h5>
        <div class="card-body">
            <?php 
            //Partial to show the top 3 rated Bands
                include 'partials/topThreeBand.php'; 
                ?>
        </div>
    </div>
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Top 3 Venues</h5>
        <div class="card-body">
            <?php 
                //Partial to show the top 3 rated Venues
                include 'partials/topThreeVenue.php'; 
             ?>
        </div>
    </div>

</div>
