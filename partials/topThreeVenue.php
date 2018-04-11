<?php


 $query = "select *
from venue
order by rating desc
limit 3";
 
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($row = $result->fetch_assoc()) {
           
           
            $name = $row['name'];
           $bandId = $row['id'];
            $image = $row['image'];
           $rating = $row['rating'];
           
            
           ?>

 <a href="singleProfile.php?id=<?php echo $bandId ?>"><h2 class="card-title"><?php echo $name ?></h2></a>
 <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $image ?>" alt="">
 <h5>Rating: <?php echo $rating ?></h5>
 <?php if ($rating == 0) {
    ?> <span class="stars">0</span>
         <?php   }else{ ?>
 <span class="stars"><?php echo $rating ?></span>
 <hr/>
 <?php
         }
        }
            


