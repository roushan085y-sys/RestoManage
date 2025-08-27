<?php
include 'db.php';
$result = $connection->query("SELECT * FROM orders ORDER BY id DESC");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $connection->query("UPDATE orders SET status='$status' WHERE id=$id");
    header("Location: admin_orders.php"); // refresh
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Manage Orders</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <h2 class="text-2xl font-bold text-center bg-red-500 text-white py-4">
      📋 Manage Orders
    </h2>
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-center">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="px-4 py-2">Order ID</th>
            <th class="px-4 py-2">Customer</th>
            <th class="px-4 py-2">Contact</th>
            <th class="px-4 py-2">Address</th>
            <th class="px-4 py-2">Product</th>
            <th class="px-4 py-2">Qty</th>
            <th class="px-4 py-2">Total</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Update</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2"><?= $row['order_id'] ?></td>
            <td class="px-4 py-2 font-semibold"><?= $row['customer_name'] ?></td>
            <td class="px-4 py-2"><?= $row['contact'] ?></td>
            <td class="px-4 py-2"><?= $row['address'] ?></td>
            <td class="px-4 py-2"><?= $row['product_name'] ?></td>
            <td class="px-4 py-2"><?= $row['quantity'] ?></td>
            <td class="px-4 py-2 text-green-600 font-bold">₹<?= $row['total_price'] ?></td>
            <td class="px-4 py-2 font-bold 
                <?php if($row['status']=='Pending') echo 'text-orange-500'; ?>
                <?php if($row['status']=='Cooking') echo 'text-yellow-600'; ?>
                <?php if($row['status']=='Out for Delivery') echo 'text-blue-500'; ?>
                <?php if($row['status']=='Delivered') echo 'text-green-600'; ?>
                <?php if($row['status']=='Cancelled') echo 'text-red-600'; ?>">
              <?= $row['status'] ?>
            </td>
            <td class="px-4 py-2">
              <form method="POST" class="flex gap-2 items-center justify-center">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <select name="status" class="border rounded px-2 py-1 text-sm">
                  <option <?= $row['status']=='Pending'?'selected':'' ?>>Pending</option>
                  <option <?= $row['status']=='Cooking'?'selected':'' ?>>Cooking</option>
                  <option <?= $row['status']=='Out for Delivery'?'selected':'' ?>>Out for Delivery</option>
                  <option <?= $row['status']=='Delivered'?'selected':'' ?>>Delivered</option>
                  <option <?= $row['status']=='Cancelled'?'selected':'' ?>>Cancelled</option>
                </select>
                <button type="submit" name="update" 
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                  Update
                </button>
              </form>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
