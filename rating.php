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
</style>
 <?php 


 
 if (isset($_POST['submit'])) {

$rating = $_POST['rating'];  //  Displaying Selected Value

 
    
       
        $query = "insert into ratings(id,rating) values(36,$rating)";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   
        
}
$query = "select round(avg(rating),2) as avg from ratings where id = 36";
 
 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 $row = $result->fetch_assoc();
 $avg = $row['avg'];
 

?>
  

      
        

    
         <!-- Sidebar Widgets Column -->
      <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
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
         
            <input type="submit" name="submit" Value="Post Rating" />
            </form>
            </div>
          </div>

            
           
       
        

