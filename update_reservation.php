<?php
include("db.php");

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE reservations SET status='$status' WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        header("Location: reservations.php");
    }
}
?>
