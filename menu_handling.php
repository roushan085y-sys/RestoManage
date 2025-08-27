<?php
include 'db.php';
$result = $connection->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Menu List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

  <h2 class="text-3xl font-bold text-gray-800 mb-6">📦 Menu List</h2>

  <div class="w-full overflow-x-auto">
  <table class="w-full border-collapse bg-white dark:bg-white-800 shadow-md rounded-lg">
    <thead>
      <tr class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white">
        <th class="px-4 py-2 text-left">ID</th>
        <th class="px-4 py-2 text-left">Image</th>
        <th class="px-4 py-2 text-left">Name</th>
        <th class="px-4 py-2 text-left">Price</th>
        <th class="px-4 py-2 text-left">Description</th>
        <th class="px-4 py-2 text-left">Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP Loop yaha -->

       <?php while ($row = $result->fetch_assoc()) { ?>
          <tr class="hover:bg-gray-100 transition duration-300">
            <td class="py-3 px-4"><?= $row['id'] ?></td>
             <td class="py-3 px-4">
              <img src="<?= $row['image'] ?>" alt="Product" class="w-20 h-20 object-cover rounded-lg shadow-md">
            </td>
            <td class="py-3 px-4 font-medium text-gray-700"><?= $row['name'] ?></td>
            <td class="py-3 px-4 text-green-600 font-semibold">₹<?= $row['price'] ?></td>
            <td class="py-3 px-4 text-gray-600"><?= $row['description'] ?></td>
            <!-- <td class="py-3 px-4">
              <img src="<?= $row['image'] ?>" alt="Product" class="w-20 h-20 object-cover rounded-lg shadow-md">
            </td> -->
            <td class="py-3 px-4 text-center">
              <a href="edit_menu.php?id=<?= $row['id'] ?>" 
                 class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm shadow-md">✏️ Edit</a>
              <a href="remove_menu.php?id=<?= $row['id'] ?>" 
                 onclick="return confirm('Are you sure you want to delete this product?');"
                 class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm shadow-md ml-2">🗑️ Delete</a>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

     

</body>
</html>
