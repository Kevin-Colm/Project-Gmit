<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */

//Check if username is assigned in the sessiion
if (isset($_SESSION['username'])) {
    //If it is set we can use the id to insert into their row in the database.
    $id = $_SESSION['id'];
}////End IF
//SQL auery to check if the ID PK exists
$query = "SELECT * FROM venue WHERE id = '$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//php function to count the matching rows in the table
$count = mysqli_num_rows($result);
//IF count is greater than 0 the pk exists so execute an updte rather than an insert.
if ($count > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $img = $row['image'];
    $bio = $row['bio'];
    $rating = $row['rating'];
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}//End IF
?>

<!-- Post Content Column -->
<div class="col-lg-8">
    <!-- Title -->
    <h1 class="mt-4">Personal Profile Page</h1>
    <!-- Author -->
    <p class="lead">
        <a href="#"><?php echo $name ?></a>
    </p>
    <h2>Rating: <?php echo $rating ?></h2>
    <span class="stars"><?php echo $rating ?></span>
    
    <hr>
    <!-- Preview Image -->
    <img class="img-fluid rounded" src="<?php echo $img ?>" alt="">

    <hr>
    <!-- Post Content -->
    <p class="lead"><?php echo $bio ?></p>

    <hr>
</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-4">
    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Add/Update Event</h5>
        <div class="card-body">
            <div class="input-group">
               <a href="addEvent.php"> <button class="btn btn-primary btn-lg ">Add Event</button></a>
               <a href="updateEvent.php"> <button class="btn btn-primary btn-lg ">Update Event</button></a>
            </div> 
        </div>
    </div>
    <!--Form to update the user profile image bio and name-->
    <div class="card my-4">
        <h5 class="card-header">Update Profile:</h5>
        <div class="card-body">
            <form method="post" action="createProfile.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Venue Name</label>
                    <input class="form-control" type="text" name="name" Value="" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="fileToUpload">Profile Image</label>
                    
                    <input class="file-field" type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-group">
                    <label for="bio">Biography</label>
                    <textarea class="form-control" rows="3" name="bio"></textarea>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" rows="3" name="address"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>