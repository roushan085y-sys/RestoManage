<?php
include 'db.php';
if (!isset($_GET['id'])) die("Product not found!");

$id = $_GET['id'];
$product = $connection->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place Order</title>
  <!-- ✅ Attractive Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  <style>
    /* 🌟 Reset */
    * { margin: 0; padding: 0; box-sizing: border-box; }

    /* 🌟 Background */
    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* 🌟 Card Form */
    .form-container {
      max-width: 600px;
      width: 100%;
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🌟 Headings */
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 15px;
      font-size: 26px;
      font-weight: 700;
    }

    p {
      font-size: 16px;
      color: #555;
      margin-bottom: 10px;
    }

    strong { color: #222; }

    /* 🌟 Labels & Inputs */
    label {
      font-weight: 600;
      display: block;
      margin-top: 15px;
      color: #444;
    }
    input, textarea {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.3s ease;
    }
    input:focus, textarea:focus {
      border-color: #66a6ff;
      outline: none;
      box-shadow: 0 0 8px rgba(102,166,255,0.4);
    }

    /* 🌟 Button */
    button {
      margin-top: 20px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 15px;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 12px;
      font-size: 17px;
      font-weight: bold;
      transition: 0.3s ease-in-out;
    }
    button:hover {
      background: linear-gradient(135deg, #764ba2, #667eea);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>🛍️ Place Your Order</h2>
    <p><strong>Product:</strong> <?= $product['name'] ?></p>
    <p><strong>Price:</strong> ₹<?= $product['price'] ?></p>

    <form action="save_order.php" method="POST">
      <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
      <input type="hidden" name="price" value="<?= $product['price'] ?>">

      <label>👤 Name:</label>
      <input type="text" name="customer_name" placeholder="Enter your full name" required>

      <label>📞 Contact:</label>
      <input type="number" name="contact" placeholder="Enter your phone number" required>

      <label>🏠 Address:</label>
      <textarea name="address" placeholder="Enter your delivery address" required></textarea>

      <label>🔢 Quantity:</label>
      <input type="number" name="quantity" min="1" value="1" required>

      <button type="submit">✅ Confirm Order</button>
    </form>
  </div>
</body>
</html>
