<?php
include 'db.php';

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
} else {
    $query = "SELECT * FROM products";
}

$result = $connection->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestoManage - Product Catalog</title>
    
    <!-- ✅ Attractive Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(to right, #fff3e0, #e1bee7);
            color: #333;
        }

        /* 🌟 Navbar */
        .navbar {
            background: linear-gradient(90deg, #6a1b9a, #8e24aa);
            color: white;
            padding: 15px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }
        .navbar h2 {
            font-weight: 700;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .navbar form {
            display: flex;
            width: 100%;
            max-width: 400px;
        }
        .navbar input[type="text"] {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 25px 0 0 25px;
            outline: none;
            font-size: 15px;
        }
        .navbar button {
            padding: 12px 20px;
            border: none;
            background: #ffca28;
            color: #333;
            font-weight: 700;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            transition: 0.3s;
        }
        .navbar button:hover {
            background: #ffb300;
        }

        /* 🌟 Product Grid */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            padding: 40px 30px;
        }
        @media (min-width: 1200px) {
            .container {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        /* 🌟 Product Card */
        .card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            padding: 18px;
            text-align: left;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 14px;
        }
        .card h3 {
            margin: 12px 0 6px;
            font-size: 19px;
            font-weight: 700;
            color: #4a148c;
        }
        .card p {
            color: #555;
            font-size: 14px;
            margin-bottom: 8px;
            min-height: 40px;
        }
        .price {
            color: #d81b60;
            font-size: 16px;
            font-weight: 700;
            margin: 8px 0;
        }

        /* 🌟 Order Button */
        .btn {
            display: inline-block;
            padding: 12px 16px;
            margin-top: 12px;
            background: linear-gradient(90deg, #43a047, #1b5e20);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            transition: 0.3s;
        }
        .btn:hover {
            background: linear-gradient(90deg, #2e7d32, #145a32);
        }
    </style>
</head>
<body>

    <!-- 🌟 Navbar -->
    <div class="navbar">
        <h2>🍴 RestoManage</h2>
        <form method="GET">
            <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">🔍</button>
        </form>
    </div>

    <!-- 🌟 Product List -->
    <div class="container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                <h3><?= $row['name'] ?></h3>
                <p><?= $row['description'] ?></p>
                <div class="price">₹<?= $row['price'] ?></div>
                <button class="btn cart-btn" onclick="location.href='order.php?id=<?= $row['id'] ?>'">🍽️ Order Now</button>
            </div>
        <?php } ?>
    </div>

</body>
</html>
