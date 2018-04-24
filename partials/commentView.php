<?php


 $query = "SELECT customer.image,customer.name,event.id, comments.comment,comments.date FROM customer "
         . "INNER JOIN comments ON customer.id = comments.userId "
         . "inner join event on event.id = comments.eventId "
         . "where event.id = $eventId;";
 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 
 //While loop to get each matching row from each table in the inner join
while ($row = $result->fetch_assoc()) {
    
    $name = $row['name'];
    $image = $row['image'];
    $comment = $row['comment'];
    $date = $row['date'];
?>
<!-- Single Comment -->
          <div class="media mb-4">
              
            <img class="small mr-3 rounded-circle" src="<?php echo $image ?>" alt="" width="90" height="90">
            <div class="media-body">
              <h4 class="mt-0"><?php echo $name ?></h4>
              <h4 class="mt-0">Posted on: <?php echo $date ?></h4>
              <p><?php echo $comment ?></p>
            </div>
       <hr/>
          </div>
        

<?php
}