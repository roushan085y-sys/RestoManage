<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = $connection->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if($password === $row['password']){
    $_SESSION['admin'] = $row['username'];
    header("Location: Admin_wala.php");
    exit();
} else {
    echo "<script>alert('Invalid Password');</script>";
}
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - RestoManage</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">

  <div class="bg-white shadow-lg rounded-lg p-8 w-96">
    <h1 class="text-2xl font-bold text-center text-red-500 mb-6">Admin Login</h1>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required 
             class="w-full px-4 py-2 mb-4 border rounded focus:ring focus:ring-red-300">
      <input type="password" name="password" placeholder="Password" required 
             class="w-full px-4 py-2 mb-4 border rounded focus:ring focus:ring-red-300">
      <button type="submit" name="login"
              class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
        Login
      </button>
    </form>
  </div>

</body>
</html>
