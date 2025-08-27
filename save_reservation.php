<?php
include("db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form se data lena
    $name     = $_POST['name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $guests   = $_POST['guests'] ?? '';
    $date     = $_POST['date'] ?? '';
    $time     = $_POST['time'] ?? '';
    $occasion = $_POST['occasion'] ?? ''; // "Booking For"

    // SQL Insert
    $sql = "INSERT INTO reservations (name, email, guests, date, time, occasion, status)
            VALUES ('$name', '$email', '$guests', '$date', '$time', '$occasion', 'Pending')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Reservation Request Sent Successfully!');
                window.location.href='../index.php';
              </script>";
    } else {
        echo "❌ Error: " . $connection->error;
    }
}
?>
