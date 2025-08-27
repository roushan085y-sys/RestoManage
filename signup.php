<?php
include "db.php";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

    $sql = "INSERT INTO users (name, email, phone, password) 
            VALUES ('$name', '$email', '$phone', '$password')";

    if($connection->query($sql) === TRUE){
        // ✅ Signup successful - redirect to login
        echo "<script>
            alert('Signup Successful! Please login.');
            window.location.href='userlogin.php';
        </script>";
        exit();
    } else {
        // ✅ Proper error handling
        echo "<script>
            alert('Error: " . $connection->error . "');
            window.history.back();
        </script>";
    }
}
?>
