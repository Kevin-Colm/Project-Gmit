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