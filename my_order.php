<?php
include 'db.php';

$orders = [];
if (isset($_POST['contact'])) {
    $contact = $_POST['contact'];
    $orders = $connection->query("SELECT * FROM orders WHERE contact='$contact' ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RestoManage - My Orders</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-purple-50 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
      <h1 class="text-xl font-bold tracking-wide">🍴 RestoManage</h1>
      <ul class="flex space-x-6 font-medium">
        <li><a href="index.php" class="hover:text-yellow-300 transition">Home</a></li>
        <!-- <li><a href="orders.php" class="hover:text-yellow-300 transition">My Orders</a></li> -->
      </ul>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="w-full max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">📦 Track My Orders</h2>

    <!-- Search Form -->
    <form method="POST" class="flex flex-col sm:flex-row gap-3 mb-8">
      <input type="text" name="contact" placeholder="Enter your contact number" required
             class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 outline-none">
      <button type="submit" 
              class="px-6 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition font-medium">
        Check
      </button>
    </form>

    <!-- Orders Section -->
    <?php if ($orders && $orders->num_rows > 0): ?>
      <div class="space-y-6">
        <?php while($row = $orders->fetch_assoc()): ?>
          <div class="p-6 rounded-xl shadow-md bg-gradient-to-br from-purple-50 to-white border border-gray-200">
            <p class="text-gray-700"><span class="font-semibold">Order ID:</span> <?= $row['order_id'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Product:</span> <?= $row['product_name'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Quantity:</span> <?= $row['quantity'] ?></p>
            <p class="text-gray-700"><span class="font-semibold">Total:</span> ₹<?= $row['total_price'] ?></p>

            <!-- Status Badge -->
            <?php 
              $status = strtolower(str_replace(' ','-',$row['status']));
              $statusColors = [
                'pending'   => 'bg-yellow-100 text-yellow-700',
                'cooking'   => 'bg-blue-100 text-blue-700',
                'out'       => 'bg-purple-100 text-purple-700',
                'delivered' => 'bg-green-100 text-green-700',
                'cancelled' => 'bg-red-100 text-red-700'
              ];
              $colorClass = $statusColors[$status] ?? 'bg-gray-100 text-gray-700';
            ?>
            <span class="inline-block mt-4 px-4 py-1 rounded-full text-sm font-semibold <?= $colorClass ?>">
              <?= ucfirst($row['status']) ?>
            </span>
          </div>
        <?php endwhile; ?>
      </div>
    <?php elseif(isset($_POST['contact'])): ?>
      <p class="text-center text-red-500 font-medium">❌ No orders found for this number.</p>
    <?php endif; ?>
  </div>
</body>
</html>
