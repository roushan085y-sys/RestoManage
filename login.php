<?php
// error reporting ON (white screen problem solve hoga)
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // SQL Injection se bachne ke liye prepared statement
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // password verify karo
        if (password_verify($password, $row['password'])) {
            // ✅ login success
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('❌ Invalid Password'); window.location.href='../login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found'); window.location.href='../login.php';</script>";
    }
}
?>
