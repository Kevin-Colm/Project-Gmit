<?php

 if (isset($_POST['submitComment'])) {
     $comment = $_POST['comment'];
        //insert the rating to the rating table with the venueId and  user ID.
        $query = "insert into comments(eventId,userId,comment) values('$eventId','$userId','$comment');";
        
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
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