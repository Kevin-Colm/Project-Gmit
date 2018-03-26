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

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

          <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

          

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
