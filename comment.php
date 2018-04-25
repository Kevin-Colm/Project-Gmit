<?php

 if (isset($_POST['submitComment'])) {
     $comment = mysqli_real_escape_string($conn,$_POST['comment']);
      
        $query4 = "select userId from comments where userId= $userId and eventId = $eventId";
        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
        $num_rows = mysqli_num_rows($result4);
      if ($num_rows > 0) {
 echo '<script>alert("You have already commented on this event.");</script>';
        } else{
        //insert the rating to the rating table with the venueId and  user ID.
        $query = "insert into comments(eventId,userId,comment,date) values('$eventId','$userId','$comment',DATE(NOW()));";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

       
 }
 
 ?>
   <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <button type="submit" name="submitComment" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
  