<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */


//get sesssino id for access to tables pk.
//$id = $_SESSION['id'];
//get the type of registered user to innput customised content to their page.
$eventId = $_GET['id'];

//Inner join to get the data from the tables venue, band and event
$query = "SELECT venue.name as venueName,band.image,band.name as bandName, event.description, event.name, event.date,event.venueId,event.bandId
FROM ((event
INNER JOIN band ON event.bandId = band.id)
INNER JOIN venue ON event.venueId = venue.id)
where $eventId = event.id;";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        //Get result set and store each row in a variable
        $row = $result->fetch_assoc();
            $desc = $row['description'];
            $date = $row['date'];
            $name = $row['name'];
            $venueName = $row['venueName'];
            $image = $row['image'];
            $venueId = $row['venueId'];
            $bandId = $row['bandId'];
            $bandName = $row['bandName'];
?>
   

      <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">
              <a href="singleProfile.php?id=<?php echo $bandId ?>"> <?php echo $name ?></a>
          </h1>

          <!-- Author -->
          <h2>Live @             
            <a href="singleProfile.php?id=<?php echo $venueId ?>"><?php echo $venueName ?></a>
          </h2>

          <hr>

          <!-- Date/Time -->
          <h3>Date: <?php echo $date ?></h3>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $image ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $desc ?></p>

         
          <hr>
 

        </div>

      

        <?php 
            //check if the user is logged in
            if (isset($_SESSION['id'])) {
            //set the user id to the session id
            $userId = $_SESSION['id'];
            // Get the row from the usertype table matching the session userId.
            $query1 = "SELECT * FROM userType WHERE id = '$userId'";
            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
            $row1 = $result1->fetch_assoc();
            $type = $row1['type'];

                if($type == 'customer'){
                    //Only a customer can post a rating
                    ?>
                    <!-- Sidebar Widgets Column -->
                    <div class="col-md-4">
                        <?php
                            //Include file
                            include 'rating.php';
                        ?>
                    </div>
          <?php }//End if
            }//End if
      
        
       