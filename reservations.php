<?php
include("db.php");
// session_start();

// Admin check (Optional)
// if(!isset($_SESSION['admin_id'])){
//     header("Location: login.php");
//     exit();
// }

$sql = "SELECT * FROM reservations ORDER BY id DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reservation Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">📅 Reservation Requests</h1>

    <div class="overflow-x-auto shadow-lg rounded-lg">
      <table class="min-w-full border border-gray-300 bg-white">
        <thead class="bg-blue-500 text-white">
          <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Guests</th>
            <th class="px-4 py-2 border">Date</th>
            <th class="px-4 py-2 border">Time</th>
            <th class="px-4 py-2 border">Occasion</th>
            <th class="px-4 py-2 border">Status</th>
            <th class="px-4 py-2 border">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr class='hover:bg-gray-100'>
                          <td class='px-4 py-2 border'>{$row['id']}</td>
                          <td class='px-4 py-2 border'>{$row['name']}</td>
                          <td class='px-4 py-2 border'>{$row['email']}</td>
                          <td class='px-4 py-2 border'>{$row['guests']}</td>
                          <td class='px-4 py-2 border'>{$row['date']}</td>
                          <td class='px-4 py-2 border'>{$row['time']}</td>
                          <td class='px-4 py-2 border'>{$row['occasion']}</td>
                          <td class='px-4 py-2 border font-semibold text-yellow-600'>{$row['status']}</td>
                          <td class='px-4 py-2 border flex space-x-2'>
                            <a href='update_reservation.php?id={$row['id']}&status=Approved' 
                               class='bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded'>Approve</a>
                            <a href='update_reservation.php?id={$row['id']}&status=Rejected' 
                               class='bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded'>Reject</a>
                            <a href='delete_reservation.php?id={$row['id']}'
                               class='bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded'
                               onclick=\"return confirm('Are you sure you want to delete this reservation?');\">Delete</a>
                          </td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='9' class='text-center py-4 text-gray-500'>No Reservations Found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
