<?php
    
    //Include the database connection
    include 'db.php';

    // sql query to create 'users' table
    $table = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255)NOT NULL,

    price DECIMAL(10,2) NOT NULL,

    image VARCHAR(255) NOT NULL
)";

    //Execute the query
    if($connection->query($table)=== TRUE){
        echo "Table 'product' created successfully!";
    }else{
        echo "Error creating table: " . $connection->error;
    }

    //close connetion
    $connection->close();
?>