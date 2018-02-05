<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<h1>TEST</h1>';
        ?>
        <?php
        //Adapted from https://www.w3schools.com/php/php_mysql_select.asp
        //setup database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newtest";

// Create connection and store it in conn variable
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //sql query
        $sql = "SELECT * FROM testinput";
        //store the result into variable
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["input"] ."<br>";
            }
        } else {
            echo "0 results";
        }
        //close the connection to the database.
        $conn->close();
        ?>
    </body>
</html>
