<?php
 include 'partials/home_hero.php';
//get sesssino id for access to tables pk.
//$id = $_SESSION['id'];
//get the type of registered user to innput customised content to their page.
$id = $_GET['id'];
$query = "SELECT venue.name as venueName,band.image,band.name as bandName, event.description, event.name, event.date,event.venueId,event.bandId
FROM ((event
INNER JOIN band ON event.bandId = band.id)
INNER JOIN venue ON event.venueId = venue.id)
where $id = event.id;
";
 ?>

    <?php
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
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
          <h1 class="mt-4"><?php echo $name ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $venueName ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p><?php echo $date ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $image ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $desc ?></p>

         
          <hr>

         

        

     

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

              <?php 
              if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        
        $query1 = "SELECT * FROM userType WHERE id = '$userId'";
            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
            $row1 = $result1->fetch_assoc();
            $type = $row1['type'];
        if($type == 'customer'){
            include 'rating.php';
        }
              }
        ?>
        </div>
       