<?php
       //include the connection to the database file
       include 'dbConnect.php';
        ?>
        <?php
        //sql query
        $sql = "SELECT * FROM testinput";
        //store the result into variable
        $result = $conn->query($sql);
        //check that there are rows in the table
        if ($result->num_rows > 0) {
            // output data of each row.
            //while loop to get each row
            while ($row = $result->fetch_assoc()) {
                //disply message to user after click event.
                echo "<h1>Data row from ajax call... </h1> <h2>" . $row["input"] ."</h2>";
                 echo'<img src="'. $row["image"].'"/>';
            }
            //message to print out if the table is empty
        } else {
            echo "0 results";
        }
       
     
       
             