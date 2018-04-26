<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */

//Keep track of the users session id for database connection if needed.
session_start();
// Include the header partial.
include 'partials/header.php';

//Check if username is assigned in the sessiion
if (isset($_SESSION['username'])) {
    //If it is set we can use the id to insert into their row in the database.
    $id = $_SESSION['id'];
}//End if

//Update Event
//check if the form update event has been submitted.
if (isset($_POST["submitUpdate"])) {
    //esacpe string used to allow ('$%^&!"€) characters
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $date = $_POST['date'];
    $name = mysqli_real_escape_string($conn,$_POST['title']);
    $eventId = $_POST['events'];
    
    $query = "update event set description = COALESCE(NULLIF( '$description',''),description),date=COALESCE(NULLIF( '$date',''),date),name=COALESCE(NULLIF( '$name',''),name) where id = '$eventId';";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    //redirect to home page
    header("Location: index.php");
}//End if
?>
<div class="col-6">
<div class="card my-4">
    <h5 class="card-header">Update Event:</h5>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">

                <label for="event-title">Event Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
              
            </div>
            <div class="form-group">
                <label for="event-description">Event Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="event-date">Event Date</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="event-band">Select Event</label>
                <select name="events">


                    <?php
                    //Populate the dropdown in the create event form from the database.
                    $query1 = "SELECT * FROM event where $id = venueId";

                    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                    //While loop to populate each dopdown item with the event name
                    while ($row1 = $result1->fetch_assoc()) {
                        $name = $row1['name'];
                        $description = $row1['description'];
                        $date = $row1['date'];
                        $eventId = $row1['id'];
                        //The event id is used to get the event id in the event table for updating.
                        echo "<option value='" . $eventId . "'>" . $name . "</option>";
                    }//End while
                    ?>
                </select>
               </div>
                <button type="submit" name="submitUpdate">Update Event</button>
            
        </form>
    </div>
</div>
</div>


<?php
include 'partials/footer.php';
