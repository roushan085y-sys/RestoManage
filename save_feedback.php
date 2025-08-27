<?php
include 'db.php'; // yaha tumhara db connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $message = $connection->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback (rating, message) VALUES ('$rating', '$message')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('✅ Thank you for your feedback!'); window.location.href='index.php';</script>";
    } else {
        echo "❌ Error: " . $connection->error;
    }
}
?>
