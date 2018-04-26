<?php
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

        <div class="panel panel-white post panel-shadow">

            <?php
            while ($row2 = $result1->fetch_assoc()) {
                $type = $row2['type'];
                $rating = $row2['rating'];
                ?>
                <div class="comment-rating col-xs-3 pull-right">
                    <p>Rated <?php echo $type ?> </p> <span class="stars"><?php echo $rating ?></span>
                </div>
            <?php } ?>
            <div class="post-heading">

                <div class="pull-left image">
                    <img src="<?php echo $image ?>" class="img-circle avatar" alt="user profile image" >
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <b><?php echo $name ?></b>

                    </div>
                    <h6 class="text-muted time"><?php echo $date ?></h6>
                </div>

            </div> 
            <div class="post-description"> 
                <p><?php echo $comment ?></p>
            </div>

        </div>
    </div>

    <?php
}