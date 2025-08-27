<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $connection->query("SELECT * FROM products WHERE id=$id");
    $product = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $desc  = $_POST['description'];

    // Check if new image uploaded
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $fileName;

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // Delete old image
        $oldImage = $_POST['old_image'];
        if (file_exists($oldImage)) unlink($oldImage);

        $connection->query("UPDATE products SET name='$name', price='$price', description='$desc', image='$targetFilePath' WHERE id=$id");
    } else {
        $connection->query("UPDATE products SET name='$name', price='$price', description='$desc' WHERE id=$id");
    }

    header("Location: menu_handling.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">✏️ Edit Product</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
      <input type="hidden" name="id" value="<?= $product['id'] ?>">
      <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

      <!-- Name -->
      <div>
        <label class="block text-gray-700 font-medium mb-2">Name</label>
        <input type="text" name="name" value="<?= $product['name'] ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>

      <!-- Price -->
      <div>
        <label class="block text-gray-700 font-medium mb-2">Price</label>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>

      <!-- Description -->
      <div>
        <label class="block text-gray-700 font-medium mb-2">Description</label>
        <textarea name="description" rows="4" required
                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none"><?= $product['description'] ?></textarea>
      </div>

      <!-- Current Image -->
      <div>
        <label class="block text-gray-700 font-medium mb-2">Current Image</label>
        <img src="<?= $product['image'] ?>" alt="Product" class="w-32 h-32 object-cover rounded-lg shadow-md border">
      </div>

      <!-- Upload New Image -->
      <div>
        <label class="block text-gray-700 font-medium mb-2">Upload New Image (optional)</label>
        <input type="file" name="image" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
               file:rounded-lg file:border-0 file:text-sm file:font-semibold
               file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" name="update"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-300">
          ✅ Update Product
        </button>
      </div>
    </form>
  </div>

</body>
</html>
