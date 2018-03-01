<?php
 /* App Name: Gig Guide.
  * @Author's:
  * Kevin Gleeson
  * Colm Woodlock
  * Version: 1.0
  * Date: 18/02/2017
  *
*/
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        //session id for user
        session_start();
        //Include database connection
        include 'dbConnect.php';
        //Check if username is assigned in the sessiion
        if (isset($_SESSION['userName'])) {
            //If it is set we can use the id to insert into their row in the database.
            $id = $_SESSION['id'];
        }

        //Check if the submit post http request has been set
        if (isset($_POST['submit'])) {
            //Get name from the form
            $name = $_POST['name'];
            //GEt tyoe from dropdown in form
            $type = $_POST['type'];
             
        
            //SQL auery to check if the ID PK exists
            $query = "SELECT * FROM $type WHERE id = '$id'";
            $result1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
            //php function to count the matching rows in the table
            $count1 = mysqli_num_rows($result1);
            //IF count is greater than 0 the pk exists so execute an updte rather than an insert.
            if ($count1 > 0) {
               $query = "UPDATE $type SET name = '$name' WHERE id=$id;";
               
               mysqli_query($conn, $query) or die(mysqli_error($conn));
                //Test output
                echo'<h1>'.$id.'his profile already exists you can update it on your page</h1>';
            } 
         
                       //SQL auery to check if the ID PK exists
            $query1 = "SELECT * FROM userType WHERE id = '$id'";
            $result = mysqli_query($conn, $query1) or die(mysqli_error($conn));
            //php function to count the matching rows in the table
            $count = mysqli_num_rows($result);
            if($count==0){
                //If there is no PK then an insert will be ok
                $query = "insert into $type(id,name)VALUES('$id','$name');";
                $query .= "INSERT INTO userType (id,type)VALUES('$id','$type');"; 
                mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
                //Test output.
                echo "You have selected :" . $type;  // Displaying Selected Value
             
            }
        }
        ?>                



        <form  method="post">
            <select name="type">
                <option value="customer">Customer</option>
                <option value="band">Band</option>
                <option value="venue">Venue</option>
            </select>
            <input type="text" name="name" Value="" placeholder="Enter name">

            <input type="submit" name="submit" value="Submit Profile." />

        </form>

        <p>Please choose a the type of user.</p>

    </body>
</html>

