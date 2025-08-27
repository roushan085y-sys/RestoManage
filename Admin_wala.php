<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - RestoManage</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <header class="flex justify-between items-center px-6 py-4 bg-white shadow-md">
    <h1 class="text-2xl font-bold text-red-500">🍴 RestoManage Admin</h1>
  </header>

  <!-- Layout -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-white shadow-md p-6 space-y-4">
      <h2 class="text-lg font-bold mb-4">Manage</h2>
      <nav class="space-y-2">
        <!-- <button onclick="showSection('dashboard')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">📊 Dashboard</button> -->
        <button onclick="showSection('menu')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">🍽️ Menu</button>
        <button onclick="showSection('orders')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">🛒 Orders</button>
        <button onclick="showSection('reservations')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">📅 Reservations</button>
        <button onclick="showSection('users')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">👥 Users</button>
        <button onclick="showSection('feedback')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">💬 Feedback</button>
        <button onclick="showSection('logout')" class="w-full text-left px-4 py-2 rounded hover:bg-red-500 hover:text-white">💬 logout</button>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <!-- Dashboard Section -->
      <!-- <section id="dashboard" class="section">
        <h2 class="text-2xl font-bold mb-6">📊 Dashboard Overview</h2>
        <p class="text-gray-600">Welcome to the admin panel.</p>
      </section> -->

      <!-- Menu Section -->
      <section id="menu" class="section hidden">
        <h2 class="text-2xl font-bold mb-6">🍽️ Manage Menu</h2>
        <a href="data_entry.html">
          <button class="px-4 py-2 bg-red-500 text-white rounded">+ Add Dish</button>
        </a>
         <!-- experiment start -->
             <?php
              include 'menu_handling.php';

              ?>
              <!-- experiment end -->
      </section>

      <!-- Orders Section -->
      <section id="orders" class="section hidden">
        <h2 class="text-2xl font-bold mb-6">🛒 Manage Orders</h2>
        
        <?php
        include 'admin_orders.php';
        ?>



      </section>

      <!-- Reservations Section -->
      <section id="reservations" class="section hidden">
        <a href="reservations.php">
        <h2 class="text-2xl font-bold mb-6">📅 Manage Reservations</h2></a>
        <!-- <a href="reservations.php" class="block px-3 py-2 rounded bg-blue-600 hover:bg-blue-700">
        Reservations -->
      </a>

      <?php
        include 'reservations.php';
      ?>
      
      </section>

      <!-- Users Section -->
      <section id="users" class="section hidden">
        <h2 class="text-2xl font-bold mb-6">👥 Manage Users</h2>
      <!-- Experiment start no 2 -->
            <?php
            include 'users.php';

      ?>
      <!-- Experiment end no 2 -->
      </section>

      <!-- Feedback Section -->
      <section id="feedback" class="section hidden">
        <h2 class="text-2xl font-bold mb-6">💬 User Feedback</h2>
        <?php
        include 'retrive_feed.php';
        ?>
      </section>



     
    </main>
  </div>

  <!-- Scripts -->
  <script>
    // Section Switching
    function showSection(sectionId) {
      document.querySelectorAll(".section").forEach(sec => sec.classList.add("hidden"));
      document.getElementById(sectionId).classList.remove("hidden");
    }
  </script>
</body>
</html>
