<?php
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */
/*  
 * File to gather each comment a customer has submitted
 * Along with any ratings the customer has left for the particular event.
 */

//inner join to get all of the needed dat from the customer, event and comments table.
$query = "SELECT customer.id as custId,customer.image,customer.name,event.id, comments.comment,comments.date FROM customer "
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
    $custId = $row['custId'];
    //nested query within the while loop to get each rating for each user comment posted
    $query1 = "SELECT ratings.rating, usertype.type from ratings "
            . "inner join usertype on ratings.id = usertype.id "
            . "where ratings.eventId = $eventId and ratings.userId = $custId;";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    ?>
    <!-- Single Comment -->



    <div class="col-lg-8">
            <!--Container for the comments and ratings-->
        <div class="panel panel-white post panel-shadow">

            <?php
            //Nested while loop to get each rating the customer has left (if any).
            while ($row2 = $result1->fetch_assoc()) {
                //Get the type (Band or venue)
                $type = $row2['type'];
                //Get the rating
                $rating = $row2['rating'];
                //put the rating along with the user type of band or venue into the below div.
                //One div is created for each rating with the while loop.
                ?>
                <div class="comment-rating col-xs-3 pull-right">
                    <p>Rated <?php echo $type ?> </p> <span class="stars"><?php echo $rating ?></span>
                </div>
            <?php }//end while loop ?>
            <div class="post-heading">
                <!--container for the user image floated left-->
                <div class="pull-left image">
                    <img src="<?php echo $image ?>" class="img-circle avatar" alt="user profile image" >
                </div>
                <!--container for the name and date of the comment-->
                <div class="pull-left meta">
                    <div class="title h5">
                        <b><?php echo $name ?></b>

                    </div>
                    <h6 class="text-muted time"><?php echo $date ?></h6>
                </div>

            </div> 
            <!--container for the comment-->
            <div class="post-description"> 
                <p><?php echo $comment ?></p>
            </div>

        </div>
    </div>

    <?php
}// End while loop