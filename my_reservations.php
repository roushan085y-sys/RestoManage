<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "restaurant_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM reservations WHERE user_id = $user_id ORDER BY date DESC, time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Reservations</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-500">

<nav class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-extrabold tracking-tight text-red-600">RestoManage</h1>
    <ul class="flex gap-6">
      <li><a href="index.html" class="hover:text-yellow-500">Home</a></li>
      <li><a href="menu.html" class="hover:text-yellow-500">Menu</a></li>
      <li><a href="reservation.html" class="hover:text-yellow-500">Reserve Table</a></li>
      <li><a href="Approve.php" class="text-yellow-600 font-semibold">My Reservations</a></li>
    </ul>
  </div>
</nav>

<section class="py-16">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-8 text-center">My Reservations</h2>

    <div class="overflow-x-auto shadow-lg rounded-2xl">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-200 dark:bg-gray-700">
            <th class="px-6 py-3">Reservation ID</th>
            <th class="px-6 py-3">Date</th>
            <th class="px-6 py-3">Time</th>
            <th class="px-6 py-3">Guests</th>
            <th class="px-6 py-3">Occasion</th>
            <th class="px-6 py-3">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $status = $row['status'];
                $color = $status == 'Pending' ? 'bg-yellow-500' : ($status == 'Approved' ? 'bg-green-600' : 'bg-red-600');
                echo "<tr class='border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 transition'>
                        <td class='px-6 py-4 font-semibold'>R#".$row['id']."</td>
                        <td class='px-6 py-4'>".$row['date']."</td>
                        <td class='px-6 py-4'>".$row['time']."</td>
                        <td class='px-6 py-4'>".$row['guests']."</td>
                        <td class='px-6 py-4'>".$row['occasion']."</td>
                        <td class='px-6 py-4'>
                          <span class='px-3 py-1 rounded-full text-white $color'>$status</span>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='px-6 py-4 text-center'>No reservations found.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

</body>
</html>
