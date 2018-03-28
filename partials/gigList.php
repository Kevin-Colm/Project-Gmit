<?php


 $query = "SELECT band.image , event.description, event.name, event.date
FROM event
INNER JOIN band ON event.bandId = band.id;
";
 ?>
<div class="col-md-8">
    <?php
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = $result->fetch_assoc()) {
            $desc = $row['description'];
            $date = $row['date'];
            $name = $row['name'];
            $image = $row['image'];
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
              <a href="#">Start Bootstrap</a>
              
            </div>
          </div>
           
      <?php  }?>
</div>
