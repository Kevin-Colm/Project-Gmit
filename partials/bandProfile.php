<?php
 //Check if username is assigned in the sessiion
        if (isset($_SESSION['username'])) {
            //If it is set we can use the id to insert into their row in the database.
            $id = $_SESSION['id'];
        }
        //SQL auery to check if the ID PK exists
            $query = "SELECT * FROM band WHERE id = '$id'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            //php function to count the matching rows in the table
            $count = mysqli_num_rows($result);
            //IF count is greater than 0 the pk exists so execute an updte rather than an insert.
            if ($count > 0) {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $img = $row['image'];
                $bio = $row['bio'];
                mysqli_query($conn, $query) or die(mysqli_error($conn));
              
            }

        

?>
<!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">Band Profile</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $name ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on January 1, 2018 at 12:00 PM</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $img ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $bio ?></p>

         

          

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          

          <!-- Categories Widget -->
<!--          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="createProfile.php">Update Profile</a>
                    </li>
                    
                  </ul>
                </div>
            
              </div>
            </div>
          </div>-->
 <div class="card my-4">
            <h5 class="card-header">Update Profile:</h5>
            <div class="card-body">
              <form method="post" action="createProfile.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" Value="" placeholder="Enter name">
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                    <textarea class="form-control" rows="3" name="bio"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>
