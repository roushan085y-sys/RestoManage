<?php
include 'db.php';

$name = $_POST['customer_name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$total = $price * $quantity;

// Generate unique order ID
$order_id = "O" . rand(1000,9999);

$sql = "INSERT INTO orders (order_id, customer_name, contact, address, product_name, quantity, total_price, status)
        VALUES ('$order_id', '$name', '$contact', '$address', '$product_name', $quantity, $total, 'Pending')";

if ($connection->query($sql) === TRUE) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Bill</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .bill-card {
      background: #fff;
      padding: 30px;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      max-width: 450px;
      width: 100%;
      text-align: left;
      animation: slideUp 0.8s ease-in-out;
    }
    @keyframes slideUp {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .bill-card h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2e7d32;
      font-size: 26px;
      font-weight: bold;
    }
    .bill-row {
      display: flex;
      justify-content: space-between;
      margin: 10px 0;
      font-size: 15px;
      color: #444;
    }
    .total {
      font-size: 20px;
      font-weight: bold;
      color: #d32f2f;
      border-top: 2px dashed #ccc;
      padding-top: 12px;
      margin-top: 15px;
    }
    .status {
      text-align: center;
      margin-top: 20px;
      padding: 10px;
      background: #fff3cd;
      border-radius: 8px;
      font-weight: bold;
      color: #856404;
    }
    .btn {
      display: block;
      width: 100%;
      padding: 14px;
      margin-top: 18px;
      background: linear-gradient(135deg, #42a5f5, #1976d2);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn:hover {
      background: linear-gradient(135deg, #1976d2, #0d47a1);
    }
    .btn.back {
      background: linear-gradient(135deg, #66bb6a, #388e3c);
    }
    .btn.back:hover {
      background: linear-gradient(135deg, #388e3c, #1b5e20);
    }
  </style>
</head>
<body>

  <div class="bill-card"> 
     
      <?php 
  include 'thankyou.php'
  ?>
    <h2>📃 Order Bill</h2>
    
    <div class="bill-row"><strong>Order ID:</strong> <span><?= $order_id ?></span></div>
    <div class="bill-row"><strong>Name:</strong> <span><?= $name ?></span></div>
    <div class="bill-row"><strong>Contact:</strong> <span><?= $contact ?></span></div>
    <div class="bill-row"><strong>Address:</strong> <span><?= $address ?></span></div>
    <div class="bill-row"><strong>Product:</strong> <span><?= $product_name ?></span></div>
    <div class="bill-row"><strong>Quantity:</strong> <span><?= $quantity ?></span></div>
    <div class="bill-row"><strong>Price:</strong> <span>₹<?= $price ?></span></div>
    
    <div class="bill-row total"><strong>Total:</strong> <span>₹<?= $total ?></span></div>
    
    <div class="status">🕒 Status: Pending</div>
    
    <a href="my_order.php" class="btn">📦 Track My Order</a>
    <a href="menu.php" class="btn back">🔙 Back to Menu</a>
  </div>

</body>
</html>
<?php
} else {
    echo "Error: " . $connection->error;
}
?>
