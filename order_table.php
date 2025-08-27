<?php
    
    //Include the database connection
    include 'db.php';

    // sql query to create 'users' table
    $table = "CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(20) NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    contact VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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