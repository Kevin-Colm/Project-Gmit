
<!DOCTYPE html>
<html>
<body>
<?php
session_start();
include 'dbConnect.php';
                if (isset($_SESSION['userName'])) {
                    
                    $id = $_SESSION['id'];
    
                }
                  
           
                                 
                

if(isset($_POST['submit'])){

   $type = $_POST['type'];
           $query = "insert into $type(id)VALUES('$id')";

   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
echo "You have selected :" .$type;  // Displaying Selected Value
}
?>                
                


<form  method="post">
<select name="type">
<option value="customer">Customer</option>
<option value="band">Band</option>
<option value="venue">Venue</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>

<p>Please choose a the type of user you wish to be.</p>

</body>
</html>

