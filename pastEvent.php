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
include 'partials/header.php';
include 'partials/home_hero.php';
 $query = "SELECT venue.name as venueName,band.image,band.name as bandName, event.description,event.id, event.name, event.date,event.venueId,event.bandId
FROM ((event
INNER JOIN band ON event.bandId = band.id)
INNER JOIN venue ON event.venueId = venue.id);
";
?>
<div class="col-lg-12">
   <h2>Past Events</h2>
    <?php
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = $result->fetch_assoc()) {
            $desc = $row['description'];
            $date = $row['date'];
            $name = $row['name'];
            $venueName = $row['venueName'];
            $image = $row['image'];
            $venueId = $row['venueId'];
            $bandId = $row['bandId'];
            $bandName = $row['bandName'];
            $eventId= $row['id'];
            $dateCheck = new DateTime($row['date']);
$now = new DateTime();

if($dateCheck < $now) {
            ?>
                 <!-- Blog Post -->
          <div class="card mb-4">
           
            <div class="card-body">
                <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $image ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
         <h2 class="card-title">Event: <?php echo $name ?></h2>
              <a href="singleProfile.php?id=<?php echo $bandId ?>"><h2 class="card-title"><?php echo $bandName ?></h2></a>
              
              <p class="card-text"><?php echo $desc ?></p>
              
              <a href="singleEvent.php?id=<?php echo $eventId ?>" class="btn btn-primary">Read More &rarr;</a>
              
            </div>
              
            <div class="card-footer text-muted">
              Posted on <?php echo $date ?> by
              <a href=" singleProfile.php?id=<?php echo $venueId ?>"><?php echo $venueName ?></a>
              
            </div>
        </div>
      </div>
      <!-- /.row -->

                
              
          </div>
           
      <?php  }
        }?>
</div>
<?php
include 'partials/footer.php';