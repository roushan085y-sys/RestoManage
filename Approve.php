<?php
include 'db.php';

$orders = [];
if (isset($_POST['email'])) {
    $contact = $_POST['email'];
    $orders = $connection->query("SELECT * FROM reservations WHERE email='$contact' ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Orders</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200 min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-3xl bg-white shadow-xl rounded-2xl p-8">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">📌 Check Your Booking Status</h2>
    
    <form method="POST" class="flex flex-col sm:flex-row gap-3 mb-8">
      <input type="email" name="email" placeholder="Enter your email" required
             class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
      <button type="submit" 
              class="px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition font-medium">
        Check
      </button>
    </form>

    <?php if ($orders && $orders->num_rows > 0): ?>
      <div class="space-y-5">
        <?php while($row = $orders->fetch_assoc()): ?>
          <div class="p-6 rounded-xl shadow-md bg-gradient-to-br from-white to-gray-50 border border-gray-200">
            <p class="text-gray-700"><span class="font-semibold">Booking ID:</span> <?= $row['id'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Name:</span> <?= $row['name'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Email:</span> <?= $row['email'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Time:</span> <?= $row['time'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Date:</span> <?= $row['date'] ?></p>

            <!-- Status Badge -->
            <?php 
              $status = strtolower(str_replace(' ','-',$row['status']));
              $statusColors = [
                'pending' => 'bg-yellow-100 text-yellow-700',
                'cooking' => 'bg-blue-100 text-blue-700',
                'out' => 'bg-purple-100 text-purple-700',
                'delivered' => 'bg-green-100 text-green-700',
                'cancelled' => 'bg-red-100 text-red-700'
              ];
              $colorClass = $statusColors[$status] ?? 'bg-gray-100 text-gray-700';
            ?>
            <span class="inline-block mt-3 px-4 py-1 rounded-full text-sm font-semibold <?= $colorClass ?>">
              <?= ucfirst($row['status']) ?>
            </span>
          </div>
        <?php endwhile; ?>
      </div>
    <?php elseif(isset($_POST['email'])): ?>
      <p class="text-center text-red-500 font-medium">❌ No Reservation orders found for this email.</p>
    <?php endif; ?>
  </div>
</body>
</html>
