<?php
// Database connection
include 'db.php';

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $desc  = $_POST['description'];

    // File upload handling
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Insert into database
        $sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sdss", $name, $price, $desc, $targetFilePath);

        if ($stmt->execute()) {
            echo "✅ Product added successfully!";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Failed to upload image.";
    }
}
$connection->close();
?>
