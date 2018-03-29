<?php
//SELECT Orders.OrderID, Customers.CustomerName, Shippers.ShipperName
//FROM ((Orders
//INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
//INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID);

 $query = "SELECT venue.name as venueName, venue.id, band.image , event.description, event.name, event.date
FROM ((event
INNER JOIN band ON event.bandId = band.id)
INNER JOIN venue ON event.venueId = venue.id);
";
 ?>
<div class="col-md-8">
    <?php
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = $result->fetch_assoc()) {
            $desc = $row['description'];
            $date = $row['date'];
            $name = $row['name'];
            $venueName = $row['venueName'];
            $image = $row['image'];
            $id = $row['id'];
            ?>
           <!-- Blog Post -->
          <div class="card mb-4">
           
            <div class="card-body">
                <img class="card-img-top" src="<?php echo $image ?>" alt="Card image cap">
              <h2 class="card-title">Event: <?php echo $name ?></h2>
              <h2 class="card-title">Band: <?php echo $name ?></h2>
              
              <p class="card-text"><?php echo $desc ?></p>
              
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
              
            </div>
              
            <div class="card-footer text-muted">
              Posted on <?php echo $date ?> by
              <a href=" singleProfile.php?id=<?php echo $id ?>"><?php echo $venueName ?></a>
              
            </div>
          </div>
           
      <?php  }?>
</div>
