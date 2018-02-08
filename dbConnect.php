<?php
        //Adapted from https://www.w3schools.com/php/php_mysql_select.asp
        //setup database connection
        $servername = "104.196.55.112";
	$username = "KG";
	$password = "KG";
	$dbname = "newtest";

// Create connection and store it in conn variable
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }