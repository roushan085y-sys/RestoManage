<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get product image path to delete file
    $res = $connection->query("SELECT image FROM products WHERE id=$id");
    $row = $res->fetch_assoc();
    if (file_exists($row['image'])) {
        unlink($row['image']); // delete image file
    }

    // Delete product from DB
    $connection->query("DELETE FROM products WHERE id=$id");
}

header("Location: menu_handling.php");
exit;
?>
