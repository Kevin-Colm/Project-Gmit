<?php

include 'partials/header.php';
include 'partials/home_hero.php';
//Inner join to get all badn, venue and event data for the gig list on the home page.
$query = "SELECT * FROM venue;";
?>


<div class="col-md-8">
    <h2>Registered Venue's</h2>
<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//While loop to get each matching row from each table in the inner join
while ($row = $result->fetch_assoc()) {
   
    $name = $row['name'];
    
    $image = $row['image'];
    
    $id = $row['id'];
    

   
        ?>
            <!-- Blog Post -->
            <div class="card mb-4">

                <div class="card-body"> 
                      
                    <div class="row">
                      
                        <div class="col-md-7">
                    
                            <a href="singleProfile.php?id=<?php echo $id ?>">
                                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $image ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h2 class="card-title"><a href="singleProfile.php?id=<?php echo $id ?>"><?php echo $name ?></a></h2>
                        </div>
                        
                       
                    </div>
                    
                </div>
                <!-- /.row -->



            </div>

    <?php }

?>
</div>
<div class="col-md-4">




    <!-- Side Widget -->
    <h2>Top Venue's</h2>
    <div class="card my-4">
        <h5 class="card-header">Top 3 Venue's</h5>
        <div class="card-body">
            <?php 
            //Partial to show the top 3 rated Bands
                include 'partials/topThreeVenue.php'; 
                ?>
        </div>
    </div>
   

</div>
<?php
include 'partials/footer.php';

