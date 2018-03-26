<?php


 $query = "SELECT * FROM `event`";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = $result->fetch_assoc()) {
            $desc = $row['description'];
            $date = $row['date'];
            $name = $row['name'];
            ?>
           <!-- Blog Post -->
          <div class="card mb-4">
           
            <div class="card-body">
                
              <h2 class="card-title">Event: <?php echo $name ?></h2>
              <h2 class="card-title">Band: <?php echo $name ?></h2>
              <img class="float-right" src="http://placehold.it/200x200" alt="Card image cap">
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
