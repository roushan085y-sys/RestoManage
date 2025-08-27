<?php
    $servername = "localhost";
    $username = "root";
    $password = "asusvivobook";
    $dbname = "restro";

    //dbconnect.php - global database connection file
    //$connection = new mysqli("$servername","$username","$password","",3307);
    $connection = new mysqli("localhost","root","asusvivobook","restro",3307);

    //checking connection
    if($connection->connect_error){
        die("Connection Failed: " . $connection->connect_error);
    }
    // echo "Connection Successful.";

    // create a new database (schema)


?>