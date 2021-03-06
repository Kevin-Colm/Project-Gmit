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
}//End IF

if (isset($_POST["submitEvent"])) {
    //check if the form description has been submitted.
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $date = $_POST['date'];
  
    $name = mysqli_real_escape_string($conn,$_POST['title']);
  
    $bandId = $_POST['bands'];
    //SQL query to check if the ID PK exists
    $query = "SELECT * FROM userType WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //php function to count the matching rows in the table
    $count = mysqli_num_rows($result);
    //IF count is greater than 0 the pk exists so execute an updte rather than an insert.
    if ($count > 0) {


        $query = "insert into event (venueId,description,date,name,bandId)values('$id','$description','$date','$name','$bandId')";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }//End IF
    header("Location: index.php");
}//End IF

?>
<!--Form for adding an event only a venue can see this page-->
<div class="col-6">
    <div class="card my-4">
        <h5 class="card-header">Add Event:</h5>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">

                    <label for="event-title">Event Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required="true">

                </div>
                <div class="form-group">
                    <label for="event-description">Event Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required="true"></textarea>
                </div>
                <div class="form-group">
                    <label for="event-date">Event Date</label>
                    <input type="date" id="date" name="date" required="true">
                </div>
                <div class="form-group">
                    <label for="event-band">Select Band</label>
                    <select name="bands">
                        <?php
                            //Populate the dropdown from the band table in the create event form from the database.
                            $query = "SELECT * FROM `band`";

                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $bandId = $row['id'];
                                //Put each band into the dropdown with their id as the value.
                                echo "<option value='" . $bandId . "'>" . $name . "</option>";
                            }//End While
                        ?>
                    </select>
                   </div>
                    <button type="submitEvent" name="submitEvent">Add Event</button>
            </form>
        </div>
    </div>
</div>    
    

<?php
include 'partials/footer.php';
