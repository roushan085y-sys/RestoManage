<?php
// include("../db.php");
// session_start();

// ✅ Delete user
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connection, "DELETE FROM users WHERE id=$id");
    header("Location: users.php");
    exit();
}

// ✅ Block / Unblock user
if(isset($_GET['toggle'])){
    $id = $_GET['toggle'];
    $user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT status FROM users WHERE id=$id"));
    $newStatus = ($user['status'] == 'active') ? 'blocked' : 'active';
    mysqli_query($connection, "UPDATE users SET status='$newStatus' WHERE id=$id");
    header("Location: users.php");
    exit();
}

$sql = "SELECT id, name, email, phone, status FROM users ORDER BY id DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 text-gray-900">

  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">👥 Registered Users</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 bg-white shadow-lg rounded-lg">
        <thead class="bg-indigo-500 text-white">
          <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Phone</th>
            <th class="px-4 py-2 border">Status</th>
            <th class="px-4 py-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $statusColor = ($row['status'] == 'active') ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                  echo "<tr class='hover:bg-gray-50 transition'>
                          <td class='px-4 py-2 border'>{$row['id']}</td>
                          <td class='px-4 py-2 border'>{$row['name']}</td>
                          <td class='px-4 py-2 border'>{$row['email']}</td>
                          <td class='px-4 py-2 border'>{$row['phone']}</td>
                          <td class='px-4 py-2 border $statusColor'>{$row['status']}</td>
                          <td class='px-4 py-2 border flex space-x-2 justify-center'>
                            <a href='?delete={$row['id']}' onclick=\"return confirm('Delete this user?')\" 
                               class='bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow'>
                               🗑 Delete</a>
                            <a href='?toggle={$row['id']}' 
                               class='bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded shadow'>
                               ".(($row['status'] == 'active') ? '🚫 Block' : '✅ Unblock')."</a>
                          </td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='6' class='text-center py-4 text-gray-600'>No users found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
