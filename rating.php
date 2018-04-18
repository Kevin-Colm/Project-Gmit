
<?php

/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */


$eventId = $_GET['id'];
$query = "select * from event where id = $eventId";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = $result->fetch_assoc();
   
//date to only have rating for past events            
$date = new DateTime($row['date']);
$now = new DateTime();

if($date < $now) {
    

    if (isset($_POST['rateBand'])) {

        $rating = $_POST['rating'];  //  Displaying Selected Value

        

        $bandId = $row['bandId'];
        $query4 = "select userId from ratings where userId= $userId and id = $bandId and eventID= $eventId";
        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
        $num_rows = mysqli_num_rows($result4);

        if ($num_rows > 0) {
            echo '<script>alert("You have already voted for this band");</script>';
        } else {
        $query = "insert into ratings(id,rating,userId,eventId) values($bandId,$rating,$userId,$eventId)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query2 = "select round(avg(rating),2) as avg from ratings where id = $bandId";

        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $row2 = $result2->fetch_assoc();
        $avg = $row2['avg'];

        $query3 = "update band set rating=$avg where id = $bandId";
        mysqli_query($conn, $query3) or die(mysqli_error($conn));
        }

    }
    ?>
    <!-- Sidebar Widgets Column -->
    <!-- Side Widget -->
    <!-- Rating system adapted from -->
    <div class="card my-4">
        <h5 class="card-header">Rate Band</h5>
        <div class="card-body">
            <form method="post">
                <span class="rating" >
                    <input id="rating5" type="radio" name="rating" value="5" >
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2" >
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1" checked>
                    <label for="rating1">1</label>
                    <br/><br/>

                </span>

                <input type="submit" name="rateBand" Value="Post Rating" />
            </form>
        </div>
    </div>
    <?php

    //Check if The rate venue form has been submitted
    if (isset($_POST['rateVenue'])) {
        //Get the value of the radio button selected and store it in this variable.
        $rating = $_POST['ratings']; 

       //Getting this value from the top sql query line 15
        $venueid = $row['venueId'];
        //query to check for previous votes of the same event.
        $query5 = "select userId from ratings where userId= $userId and id = $venueid and eventId = $eventId";
        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
        $num_rows1 = mysqli_num_rows($result5);
       //if the number of returned rows are 1 or more the votre has already benn cast
        if ($num_rows1 > 0) {
            echo '<script>alert("You have already voted for this venue");</script>';
        } else {
            //insert the rating to the rating table with the venueId and  user ID.
        $query = "insert into ratings(id,rating,userId,eventId) values($venueid,$rating,$userId,$eventId)";
        
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        //get average rating from the table the as alias can be used to update the rating of the venue
        $query2 = "select round(avg(rating),2) as avg from ratings where id = $venueId";

        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $row2 = $result2->fetch_assoc();
        //Get average value from the ratings table.
        $avg = $row2['avg'];
        //update the rating for the vunue.
        $query3 = "update venue set rating=$avg where id = $venueId";
        mysqli_query($conn, $query3) or die(mysqli_error($conn));
        }
        mysqli_close($conn);
    }
    ?>









    <!-- Sidebar Widgets Column -->
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Rate Venue</h5>
        <div class="card-body">
            <form method="post">
                <span class="ratings" >
                    <input id="ratings5" type="radio" name="ratings" value="5" >
                    <label for="ratings5">5</label>
                    <input id="ratings4" type="radio" name="ratings" value="4">
                    <label for="ratings4">4</label>
                    <input id="ratings3" type="radio" name="ratings" value="3">
                    <label for="ratings3">3</label>
                    <input id="ratings2" type="radio" name="ratings" value="2" >
                    <label for="ratings2">2</label>
                    <input id="ratings1" type="radio" name="ratings" value="1" checked>
                    <label for="ratings1">1</label>
                    <br/><br/>

                </span>

                <input type="submit" name="rateVenue" Value="Post Rating" />
            </form>
        </div>
    </div>

   


    
<?php
}
