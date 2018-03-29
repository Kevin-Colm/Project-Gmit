<style>
    
     .wrapper {
        padding: 20px;
        margin: 100px auto;
        width: 400px;
        min-height: 200px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,.1);
        background-color: #fff;
    }
    .rating{
        overflow: hidden;
        vertical-align: bottom;
        display: inline-block;
        width: auto;
        height: 30px;
    }
    .rating > input{
        opacity: 0;
        margin-right: -100%;
    }
    .rating > label{
        position: relative;
        display: block;
        float: right;
        background: url('Images/star-off-big.png');
        background-size: 30px 30px;
    }
    .rating > label:before{
        display: block;
        opacity: 0;
        content: '';
        width: 30px;
        height: 30px;
        background: url('Images/star-on-big.png');
        background-size: 30px 30px;
        transition: opacity 0.2s linear;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating:not(:hover) > :checked ~ label:before{
        opacity: 1;
    }
    
    
    
    
    .ratings{
        overflow: hidden;
        vertical-align: bottom;
        display: inline-block;
        width: auto;
        height: 30px;
    }
    .ratings > input{
        opacity: 0;
        margin-right: -100%;
    }
    .ratings > label{
        position: relative;
        display: block;
        float: right;
        background: url('Images/star-off-big.png');
        background-size: 30px 30px;
    }
    .ratings > label:before{
        display: block;
        opacity: 0;
        content: '';
        width: 30px;
        height: 30px;
        background: url('Images/star-on-big.png');
        background-size: 30px 30px;
        transition: opacity 0.2s linear;
    }
    .ratings > label:hover:before,
    .ratings > label:hover ~ label:before,
    .ratings:not(:hover) > :checked ~ label:before{
        opacity: 1;
    }
</style>

<?php
$eventId = $_GET['id'];

if (isset($_POST['rateBand'])) {

    $rating = $_POST['rating'];  //  Displaying Selected Value

    $query1 = "select bandId from event where id=$eventId";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row = $result1->fetch_assoc();
   
    $bandId = $row['bandId'];
    $query = "insert into ratings(id,rating) values($bandId,$rating)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $query2 = "select round(avg(rating),2) as avg from ratings where id = $bandId";

    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    $row2 = $result2->fetch_assoc();
    $avg = $row2['avg'];

    $query3 = "update band set rating=$avg where id = $bandId";
    mysqli_query($conn, $query3) or die(mysqli_error($conn));
}
?>
<!-- Sidebar Widgets Column -->
<!-- Side Widget -->
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
if (isset($_POST['rateVenue'])) {

    $rating = $_POST['ratings'];  //  Displaying Selected Value

    $query1 = "select venueId from event where id= $eventId";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row = $result1->fetch_assoc();
    $venueid = $row['venueId'];
    
    $query = "insert into ratings(id,rating) values($venueid,$rating)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $query2 = "select round(avg(rating),2) as avg from ratings where id = $venueId";

    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    $row2 = $result2->fetch_assoc();
    $avg = $row2['avg'];

    $query3 = "update venue set rating=$avg where id = $venueId";
    mysqli_query($conn, $query3) or die(mysqli_error($conn));
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




