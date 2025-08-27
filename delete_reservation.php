<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservations WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        header("Location: reservations.php");
    }
}
?>
