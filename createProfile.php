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
        if (isset($_SESSION['username'])) {
            //If it is set we can use the id to insert into their row in the database.
            $id = $_SESSION['id'];
        }

        //Check if the submit post http request has been set
        if (isset($_POST['submit'])) {
            //Get name from the form
            $name = $_POST['name'];
            //GEt tyoe from dropdown in form
            $type = $_POST['type'];
            $target_dir = "Images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            //SQL auery to check if the ID PK exists
            $query = "SELECT * FROM $type WHERE id = '$id'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            //php function to count the matching rows in the table
            $count = mysqli_num_rows($result);
            //IF count is greater than 0 the pk exists so execute an updte rather than an insert.
            if ($count > 0) {
                $query = "UPDATE $type SET name = '$name' WHERE id=$id;";

                mysqli_query($conn, $query) or die(mysqli_error($conn));
                //Test output
                echo'<h1>' . $id . 'his profile already exists you can update it on your page</h1>';
            }

            //SQL auery to check if the ID PK exists
            $query1 = "SELECT * FROM userType WHERE id = '$id'";
            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
            //php function to count the matching rows in the table
            $count1 = mysqli_num_rows($result1);
            if ($count1 == 0) {

                //If there is no PK then an insert will be ok
                $query = "insert into $type(id,name,image)VALUES('$id','$name','$target_file');";
                $query .= "INSERT INTO userType (id,type)VALUES('$id','$type');";
                mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
                //Test output.
                echo "You have selected :" . $type;  // Displaying Selected Value
            } else {
                $query = "SELECT type from userType where id= '$id'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
              echo $target_file;
                //header("location:" . $row['type'] . ".php");
            }
        }
        ?>                



        <form action="" method="post" enctype = "multipart/form-data">
            <select name="type">
                <option value="customer">Customer</option>
                <option value="band">Band</option>
                <option value="venue">Venue</option>
            </select>
            <input type="text" name="name" Value="" placeholder="Enter name">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="submit" value="Submit Profile." />

        </form>

        <p>Please choose a the type of user.</p>
<a href='logout.php'>Logout</a></br>
    </body>
</html>

