<?php
session_start();

// Agar user login nahi hai to redirect login page par bhej do
if (!isset($_SESSION['user_id'])) {
    header("Location:  backend/userlogin.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RestoManage</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

<!-- for cart and icone -->
<script src="https://unpkg.com/@phosphor-icons/web"></script>

  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 selection:bg-red-600/20 selection:text-red-800">

  <!-- Header -->
  <header class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      <a href="#" class="flex items-center gap-2">
        <span class="text-2xl font-extrabold tracking-tight text-red-600 dark:text-red-400">RestoManage</span>
      </a>






      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-6 text-sm">
        <a href="#home" class="hover:text-red-600 dark:hover:text-red-400">Home</a>
        <a href="#features" class="hover:text-red-600 dark:hover:text-red-400">Features</a>
        <a href="#specials" class="hover:text-red-600 dark:hover:text-red-400">Specials</a>
        <a href="#Birthday" class="hover:text-red-600 dark:hover:text-red-400">Birthday</a>
        <a href="#contact" class="hover:text-red-600 dark:hover:text-red-400">Contact</a>
      </nav>
      
      <div class="flex items-center gap-4">
        <div class="relative">
       <!-- <i class="ph ph-shopping-cart text-3xl text-gray-700 dark:text-gray-500"></i> -->
        <!-- <span id="cart-count" 
          class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">
          2
        </span> -->
        <!-- </a> -->
      </div>
        <button id="themeToggle" class="text-xs sm:text-sm bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded hover:bg-gray-300 dark:hover:bg-gray-600">
          Mode
        </button>

        <!-- <li><a href="logout.php">Logout</a></li> -->

        <a href="backend/logout.php" class="hidden sm:inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">Logout</a>

        <!-- Mobile menu button -->
        <button id="mobileBtn" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" aria-label="Toggle menu">
          <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>






    <!-- Mobile Nav -->
    <div id="mobileMenu" class="md:hidden hidden border-t border-gray-200 dark:border-gray-800">
      <nav class="px-4 py-3 flex flex-col gap-3 text-sm">
        <a href="#home" class="py-2">Home</a>
        <a href="#features" class="py-2">Features</a>
        <a href="#specials" class="py-2">Specials</a>
        <a href="#Birthday" class="py-2">Birthday</a>
        <a href="#contact" class="py-2">Contact</a>
      </nav>
    </div>
  </header>






<!-- Hero -->
<section id="home" class="relative overflow-hidden">
  <!-- Background -->
  <div class="absolute inset-0 -z-10">
    <div class="absolute inset-0 bg-[url('image/front.jpeg')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
  </div>

  <!-- Content -->
  <div class="max-w-7xl mx-auto px-6 py-28 md:py-40 flex flex-col md:flex-row items-center gap-10 relative z-10">
    
    <!-- Text Content -->
    <div class="md:w-1/2 text-white space-y-6" data-aos="fade-right">
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
        <span id="heroRotatingText" class="block text-amber-400 drop-shadow-lg"></span>
        Manage Your Restaurant Like a Pro
      </h1>
      <p class="text-white/90 md:text-lg max-w-lg">All-in-one solution to manage <span class="text-amber-300 font-semibold">orders</span>, <span class="text-amber-300 font-semibold">reservations</span>, staff, and more.</p>
      
      <!-- Buttons -->
      <div class="flex gap-4">
        <a href="#" class="bg-gradient-to-r from-red-500 to-amber-500 hover:scale-105 transition-transform px-7 py-3 rounded-xl font-semibold shadow-lg">🚀 Get Started</a>
        <a href="#specials" class="bg-white/10 hover:bg-white/20 backdrop-blur-lg border border-white/20 px-7 py-3 rounded-xl">🍽️ Special Menu</a>
      </div>
    </div>

    <!-- Image Content -->
    <div class="md:w-1/2 relative" data-aos="fade-left">
      <!-- Floating Glow -->
      <div class="absolute -top-10 -left-10 w-72 h-72 bg-amber-400/20 rounded-full blur-3xl animate-pulse"></div>
      <img src="image/image5.png" alt="Dashboard" class="w-full rounded-2xl shadow-2xl transform hover:scale-105 transition duration-500">
    </div>
  </div>

  <!-- Decorative Animated Shapes -->
  <div class="absolute top-20 right-10 w-24 h-24 bg-red-500/30 rounded-full blur-2xl animate-bounce"></div>
  <div class="absolute bottom-10 left-10 w-32 h-32 bg-amber-500/20 rounded-full blur-2xl animate-ping"></div>
</section>






<!-- Feature/Facilities Section: Restaurant Services -->
<section id="feature" class="relative py-20 bg-gradient-to-r from-pink-50 via-yellow-50 to-green-50 dark:from-pink-900 dark:via-purple-900 dark:to-indigo-900 overflow-hidden">

  <!-- Background Shapes -->
  <div class="absolute inset-0">
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-pink-200 rounded-full opacity-30 dark:bg-pink-700 animate-pulse-slow"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-yellow-200 rounded-full opacity-30 dark:bg-purple-700 animate-pulse-slow"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">

      <!-- Text + Service Cards -->
      <div class="order-last md:order-first z-10">
        <h3 class="text-3xl md:text-4xl font-bold mb-8 text-gray-900 dark:text-white">
          Our <span class="text-red-600">Services & Facilities</span>
        </h3>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Reservation Booking -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">📅</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Reservation Booking</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Book your table easily online or via phone.</p>
            </div>
          </div>

          <!-- Menu View -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">📖</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Menu View</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Check our delicious menu before visiting.</p>
            </div>
          </div>

          <!-- Order Tracking -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">🚚</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Order & Tracking</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Track your order in real-time for timely delivery.</p>
            </div>
          </div>

          <!-- Birthday Celebration -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">🎂</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Birthday Celebration</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Celebrate your special day with exclusive offers.</p>
            </div>
          </div>

          <!-- Events & Catering -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">🎉</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Events & Catering</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Host events with full-service catering options.</p>
            </div>
          </div>

          <!-- Live Music / Entertainment -->
          <div class="flex items-start gap-4 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow hover:scale-105 transition transform duration-300">
            <div class="text-red-600 dark:text-purple-400 text-3xl">🎵</div>
            <div>
              <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Live Music & Entertainment</h4>
              <p class="text-gray-600 dark:text-gray-300 text-sm">Enjoy live performances and a vibrant atmosphere.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Floating Restaurant Image -->
      <div class="mx-auto w-64 md:w-96 order-first md:order-last z-10 relative">
        <div class="rounded-2xl shadow-2xl p-2 bg-white dark:bg-gray-800">
          <img src="image/OIP.jpeg" 
               alt="Restaurant Feature" 
               class="w-full h-full object-cover rounded-2xl shadow-xl animate-float border-4 border-red-200 dark:border-purple-600">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Tailwind Custom Animations -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}
.animate-float {
  animation: float 4s ease-in-out infinite;
}

@keyframes pulse-slow {
  0%, 100% { transform: scale(1); opacity: 0.3; }
  50% { transform: scale(1.2); opacity: 0.5; }
}
.animate-pulse-slow {
  animation: pulse-slow 8s ease-in-out infinite;
}
</style>









<!-- Rotating Dish Showcase -->
  <section class="py-20">
    <div class="max-w-6xl mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-up">
        <!-- Image -->
        <div class="aspect-square rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-xl mx-auto w-64 md:w-96" data-aos="fade-up">
          <img src="image/8.png" alt="Dish" class="w-full h-full object-cover rounded-full animate-slowspin">
        </div>
        <!-- Text -->
        <!-- experiment -->
      
        <!-- experiment -->

       

        <div class=""  data-aos="zoom-in">


          <!-- experiment -->
      <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=36");
      ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <h3></h3>
                <p></p>
                <div class="price"></div>
                

            </div>
        
        <!-- experiment -->
           <h3 class="text-3xl font-bold mb-3"><?= $row['name'] ?></h3>
          <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
          <div class="flex items-center justify-between mt-6">
            <span class="text-xl font-bold text-red-600">Price: ₹<?= $row['price'] ?></span>
            <button class="bg-red-600 text-white px-5 py-2.5 rounded-lg hover:bg-red-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
          </div>
        </div>
        <?php } ?>
      </div>
      
    </div>
  </section>





<!-- Enhanced Specials Section with Chocolaty Aesthetic -->
<section id="specials" class="py-24 bg-gradient-to-r from-[#3e2723] via-[#4e342e] to-[#6d4c41] dark:from-[#2c1810] dark:via-[#3e2723] dark:to-[#4e342e] transition-colors duration-700 overflow-hidden relative">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-white drop-shadow-lg">Our Special Dishes</h2>
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
      
      <!-- Card 1 -->

       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=3");
      ?>

      <div class="relative bg-white/95 dark:bg-gray-900/80 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 hover:scale-105 animate-float-slow">
       
           <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <!-- <h3></h3>
                <p></p> -->
                <div class="price"></div>
               

            </div>


      <img src="image/Delicious Pizza.jpeg" class="w-full h-52 object-cover rounded-2xl mb-6 shadow-md" alt="Butter Chicken">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-yellow-600">Price: ₹<?= $row['price'] ?></span>
          <button class="bg-yellow-700 text-white px-5 py-2 rounded-xl hover:bg-yellow-800 transition duration-300"onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Card 2 -->
        <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=10");
      ?>
       
      <div class="relative bg-white/95 dark:bg-gray-900/80 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 hover:scale-105 animate-float-slow delay-300">
          
       <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <!-- <h3></h3>
                <p></p> -->
                <div class="price"></div>
               

            </div>
      <img src="image/image2.jpg" class="w-full h-52 object-cover rounded-2xl mb-6 shadow-md" alt="Pizza">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"> <?= $row['description'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-yellow-600">Price: ₹<?= $row['price'] ?></span>
           <button class="bg-yellow-700 text-white px-5 py-2 rounded-xl hover:bg-yellow-800 transition duration-300" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order now</button>
          <!-- <button class="bg-yellow-700 text-white px-5 py-2 rounded-xl hover:bg-yellow-800 transition duration-300">Add to Cart</button> -->
       </div>
   <?php } ?>
      </div>
      

      <!-- Card 3 -->

      <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=6");
      ?>

      <div class="relative bg-white/95 dark:bg-gray-900/80 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 hover:scale-105 animate-float-slow delay-600">
      <?php while ($row = $result->fetch_assoc()) { ?>  

      <img src="image/Manchurian & fried rice.jpeg" class="w-full h-52 object-cover rounded-2xl mb-6 shadow-md" alt="Sushi">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-yellow-600">Price: ₹<?= $row['price'] ?></span>
          <button class="bg-yellow-700 text-white px-5 py-2 rounded-xl hover:bg-yellow-800 transition duration-300" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order now</button>
        </div>
      </div>
        <?php } ?>
    </div>
  </div>

  <!-- Floating shapes for extra vibe -->
  <div class="absolute top-0 left-0 w-72 h-72 bg-yellow-800/20 rounded-full opacity-30 animate-float-slow -z-10"></div>
  <div class="absolute bottom-10 right-0 w-96 h-96 bg-yellow-600/10 rounded-full opacity-20 animate-float-slow delay-500 -z-10"></div>
</section>

<style>
@keyframes floatSlow {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
}
.animate-float-slow {
  animation: floatSlow 6s ease-in-out infinite;
}
.delay-300 { animation-delay: 0.3s; }
.delay-600 { animation-delay: 0.6s; }
.delay-900 { animation-delay: 0.9s; }
</style>









<!-- Aesthetic Feature Showcase -->
<section id="hero-feature" class="relative py-24 bg-gradient-to-r from-pink-50 via-yellow-50 to-purple-50 dark:from-gray-900 dark:via-purple-900 dark:to-indigo-900 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 text-center md:text-left">
    <div class="grid md:grid-cols-2 items-center gap-12">
      
      <!-- Text Content -->
      <div class="z-10">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 text-gray-800 dark:text-white">
          Experience the Best Moments With Us
        </h2>
        <p class="text-gray-700 dark:text-gray-200 text-lg mb-6">
          Enjoy premium services: reservations, live tracking, birthday celebrations, events, and gourmet dishes. Make every visit memorable!
        </p>
        <a href="reservation.php">
        <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
          Reserve Now
        </button></a>
      </div>

      <!-- Floating & Overlapping Images -->
      <div class="relative w-full h-96 md:h-128 flex justify-center items-center">
        <img src="image/pre1.jpeg" alt="Facility 1" class="absolute w-40 h-40 object-cover rounded-2xl shadow-xl animate-float" style="top:10%; left:20%;">
        <img src="image/image3.jpg" alt="Facility 2" class="absolute w-48 h-48 object-cover rounded-2xl shadow-xl animate-float delay-300" style="top:30%; left:50%;">
        <img src="image/pic3.jpeg" alt="Facility 3" class="absolute w-36 h-36 object-cover rounded-2xl shadow-xl animate-float delay-600" style="top:55%; left:25%;">
        <img src="image/1.jpeg" alt="Facility 4" class="absolute w-44 h-44 object-cover rounded-2xl shadow-xl animate-float delay-900" style="top:40%; left:70%;">
      </div>

    </div>
  </div>
</section>

<!-- Floating Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
} 
.animate-float {
  animation: float 5s ease-in-out infinite;
}
.delay-300 { animation-delay: 0.3s; }
.delay-600 { animation-delay: 0.6s; }
.delay-900 { animation-delay: 0.9s; }
</style>








<!-- Birthday Section -->
<section id="birthday" class="py-20 bg-pink-50 dark:bg-pink-900/20">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-pink-600 dark:text-pink-400">Birthday Specials</h2>
    
    <div class="flex gap-6 overflow-x-auto scrollbar-hide">
      <!-- Birthday Card 1 -->
      <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=28");
      ?>

      <div class="min-w-[18rem] bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-lg hover:scale-105 transition-transform duration-300" data-aos="zoom-in">
     
      <?php while ($row = $result->fetch_assoc()) { ?>

      <img src="image/chocolate cake.jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Chocolate Cake">
        
      <h3 class="text-xl font-semibold text-pink-600"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-lg font-bold text-red-600"> ₹<?= $row['price'] ?></span>
          <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Birthday Card 2 -->
       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=30");
      ?>
      <div class="min-w-[18rem] bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-lg hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="100">
      <?php while ($row = $result->fetch_assoc()) { ?> 
      <img src="image/Bolo delicioso!.jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Fruit Cake">
        <h3 class="text-xl font-semibold text-pink-600"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-lg font-bold text-red-600">₹<?= $row['price'] ?></span>
          <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Birthday Card 3 -->
       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=30");
      ?>
      <div class="min-w-[18rem] bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-lg hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="200">
      <?php while ($row = $result->fetch_assoc()) { ?>  
      <img src="image/download (1).jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Cupcakes">
        <h3 class="text-xl font-semibold text-pink-600"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-lg font-bold text-red-600">₹<?= $row['price'] ?></span>
          <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Birthday Card 4 -->
       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=32");
      ?>
      <div class="min-w-[18rem] bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-lg hover:scale-105 transition-transform duration-300" data-aos="zoom-in" data-aos-delay="300">
       <?php while ($row = $result->fetch_assoc()) { ?>
      <img src="image/ice cream cake.jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Ice Cream Cake">
        
      <h3 class="text-xl font-semibold text-pink-600"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-lg font-bold text-red-600">₹599</span>
          <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>






<!-- Feature/Advertising Section with Video -->
<section id="Birthday" class="py-20 bg-gradient-to-r from-pink-100 via-yellow-100 to-green-100 dark:from-pink-900 dark:via-purple-900 dark:to-indigo-900 transition-colors duration-500">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Video with smooth floating effect -->
      <div class="mx-auto w-64 md:w-96">
        <video autoplay muted loop class="w-full h-full object-cover rounded-2xl shadow-xl animate-float">
          <source src="video/birthday.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      
      <!-- Text Content -->
      <div>
        <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
          Celebrate Your Moments With Us!
        </h3>
        <p class="text-gray-700 dark:text-gray-200 mb-6 text-lg">
          We provide a cozy and aesthetic environment for birthdays, anniversaries, and special events. Book your table and make memories that last forever.
        </p>
        <!-- <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
          Book Now
        </button> -->
      </div>

    </div>
  </div>
</section>

<!-- Tailwind Custom Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 6s ease-in-out infinite;
}
</style>







<section id="birthday-celebration" class="py-20 bg-pink-50 dark:bg-pink-900/20">
  <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center gap-12">
    
    <!-- Left Text + CTA -->
    <div class="lg:w-1/2" data-aos="fade-right">
      <h2 class="text-4xl font-bold text-pink-600 mb-6">Celebrate Your Birthday With Us!</h2>
      <p class="text-gray-700 dark:text-gray-300 mb-6">
        Make your special day unforgettable! Enjoy delicious dishes, decorated ambience, and a personalized cake just for you.
      </p>
      <button class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition"><a href="reservation.php" > Book Your Celebration </a></button>
    </div>

    <!-- Right Celebration Images -->
    <div class="lg:w-1/2 relative flex justify-center items-center h-96">
      <img src="image/2.jpeg" 
           alt="Birthday Cake" class="rounded-2xl shadow-xl w-44 lg:w-64 max-w-full h-auto absolute top-0 left-0 animate-float">
      <img src="image/cel2.jpeg" 
           alt="Balloons" class="rounded-2xl shadow-lg w-40 lg:w-56 max-w-full h-auto absolute top-16 left-20 animate-float">
      <img src="image/chocolate cake.jpeg" 
           alt="Birthday Table" class="rounded-2xl shadow-xl w-44 lg:w-64 max-w-full h-auto absolute top-28 right-0 animate-float">
    </div>

  </div>
</section>

<style>
  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  .animate-float {
    animation: float 3s ease-in-out infinite;
  }

  @media (max-width: 1024px) {
    .lg\:w-1\/2 { width: 100%; }
    .relative img { position: relative !important; top: auto !important; left: auto !important; right: auto !important; margin-bottom: 1rem; }
  }
</style>







 <!-- Rotating Dish Showcase - Image Right, Text Left -->
<section class="py-20">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <!-- Text -->
      <div class="md:order-1" data-aos="zoom-in">

       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=6");
      ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <h3></h3>
                <p></p>
                <div class="price"></div>
                

            </div>
       




        <h3 class="text-3xl font-bold mb-3"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between mt-6">
          <span class="text-xl font-bold text-red-600">Price: ₹<?= $row['price'] ?></span>
          <button class="bg-red-600 text-white px-5 py-2.5 rounded-lg hover:bg-red-700" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
      </div>
      <!-- Image -->
      <div class="md:order-2 aspect-square rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-xl mx-auto w-64 md:w-96" data-aos="fade-up">
        <img src="image/Manchurian & fried rice.jpeg" alt="Dish" class="w-full h-full object-cover rounded-full animate-slowspin" >
      </div>
    </div>
     <?php } ?>
  </div>
</section> 






<!-- Features Section (Chocolaty Aesthetic Version) -->
<section id="features" class="py-24 bg-gradient-to-br from-[#3e2723] via-[#4e342e] to-[#6d4c41] text-white transition-colors duration-700">
  <div class="max-w-7xl mx-auto px-6">
    
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-amber-200 drop-shadow-lg">
      Powerful Features
    </h2>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature Card 1 -->
      <div class="bg-[#5d4037]/90 backdrop-blur rounded-3xl p-8 shadow-xl border border-amber-300 transform hover:-translate-y-3 hover:scale-105 hover:rotate-1 transition-all duration-500" data-aos="fade-up">
        <h3 class="text-2xl font-semibold mb-3 text-amber-200">📋 Menu Management</h3>
        <p class="text-amber-100 mb-4">Easily update, customize, and showcase your menu with style.</p>
        <a href="backend/menu.php" class="inline-block bg-amber-500 text-white px-5 py-2.5 rounded-xl hover:bg-amber-600 transition duration-300">Go to Menu</a>
      </div>

      <!-- Feature Card 2 -->
      <div class="bg-[#5d4037]/90 backdrop-blur rounded-3xl p-8 shadow-xl border border-orange-300 transform hover:-translate-y-3 hover:scale-105 hover:-rotate-1 transition-all duration-500" data-aos="fade-up" data-aos-delay="100">
        <h3 class="text-2xl font-semibold mb-3 text-orange-200">📦 Order Tracking</h3>
        <p class="text-amber-100 mb-4">Track dine-in, takeaway, or online orders in real-time effortlessly.</p>
        <a href="backend/my_order.php" class="inline-block bg-orange-500 text-white px-5 py-2.5 rounded-xl hover:bg-orange-600 transition duration-300">Track Order</a>
      </div>

      <!-- Feature Card 3 -->
      <div class="bg-[#5d4037]/90 backdrop-blur rounded-3xl p-8 shadow-xl border border-yellow-300 transform hover:-translate-y-3 hover:scale-105 hover:rotate-1 transition-all duration-500" data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-2xl font-semibold mb-3 text-yellow-200">📅 Table Reservations</h3>
        <p class="text-amber-100 mb-4">Allow customers to reserve tables online 24/7 in a stylish way.</p>
        <a href="reservation.php" class="inline-block bg-yellow-500 text-white px-5 py-2.5 rounded-xl hover:bg-yellow-600 transition duration-300">Reserve Now</a>
      </div>
    </div>

  </div>
</section>













  



  <!-- Feature/Advertising Section (Opposite Layout) -->
<section id="feature" class="py-20 bg-gradient-to-r from-pink-100 via-yellow-100 to-green-100 dark:from-pink-900 dark:via-purple-900 dark:to-indigo-900 transition-colors duration-500">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Text Content (Now on Left) -->
      <div class="order-last md:order-first">
        <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
          Offers 😃 Don’t wait !
        </h3>
        <p class="text-gray-700 dark:text-gray-200 mb-6 text-lg">
          <b>Flat 50% off - Limited Time Only 🔥♨️</b> for birthdays, anniversaries, and special events. Book your table or order and make memories that last forever.
        </p>
        <!-- <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
          Book Now -->
        </button>
      </div>

      <!-- Image with smooth floating effect (Now on Right) -->
      <div class="mx-auto w-64 md:w-96 order-first md:order-last">
        <img src="image/offer.jpg" 
             alt="Feature" 
             class="w-full h-full object-cover rounded-2xl shadow-xl animate-float">
      </div>

    </div>
  </div>
</section>

<!-- Tailwind Custom Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 6s ease-in-out infinite;
}
</style>

<!-- Add this CSS inside your <style> or Tailwind config -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 3s ease-in-out infinite;
}
</style>







<!-- Offer Section -->
<section id="offers" class="py-20 bg-gray-50 dark:bg-gray-800/50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Special Offers</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Offer Card 1 -->
       <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=3");
      ?>
      <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow p-4 overflow-hidden group" data-aos="fade-up">
        <!-- Badge -->
        <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">20% OFF</span>
        <!-- Image -->
         <?php while ($row = $result->fetch_assoc()) { ?>
        <img src="image/Delicious Pizza.jpeg" class="w-full h-48 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-500" alt="Butter Chicken">
        <!-- Text -->
        <h3 class="text-xl font-semibold"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['description'] ?></p>
        <!-- Price & Button -->
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-red-600">₹<?= $row['price'] ?></span>
          <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Offer Card 2 -->
        <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=5");
      ?>
      <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow p-4 overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
       
      <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Birthday Special</span>
      <?php while ($row = $result->fetch_assoc()) { ?> 
      <img src="image/noodle.jpeg" class="w-full h-48 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-500" alt="Pizza">
        <h3 class="text-xl font-semibold"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-red-600">₹<?= $row['price'] ?></span>
          <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

      <!-- Offer Card 3 -->
        <?php
      include 'backend/db.php';
      $result = $connection->query("SELECT * FROM products WHERE id=18");
      ?>
      <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow p-4 overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
        <span class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">Limited Time</span>
       <?php while ($row = $result->fetch_assoc()) { ?>
        <img src="image/download.jpeg" class="w-full h-48 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-500" alt="Sushi">
        <h3 class="text-xl font-semibold"><?= $row['name'] ?></h3>
        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $row['description'] ?></p>
        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-red-600">₹<?= $row['price'] ?></span>
          <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors" onclick="location.href='backend/order.php?id=<?= $row['id'] ?>'">Order Now</button>
        </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>







<!-- Feature/Advertising Section -->
<section id="feature" class="py-20 bg-gradient-to-r from-pink-100 via-yellow-100 to-green-100 dark:from-pink-900 dark:via-purple-900 dark:to-indigo-900 transition-colors duration-500">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Image with smooth floating effect -->
      <div class="mx-auto w-64 md:w-96">
        <img src="image/OIP (4).jpeg" 
             alt="Feature" 
             class="w-full h-full object-cover rounded-2xl shadow-xl animate-float">
      </div>
      
      <!-- Text Content -->
      <div>
        <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
          Celebrate events with us !
        </h3>
        <p class="text-gray-700 dark:text-gray-200 mb-6 text-lg">
          We provide a cozy and aesthetic environment for birthdays, anniversaries, and special events. Book your table and make memories that last forever.
        </p>
        <!-- <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
          Book Now -->
        </button>
      </div>

    </div>
  </div>
</section>

<!-- Tailwind Custom Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 6s ease-in-out infinite;
}
</style>














<!-- Events Section -->
<section id="events" class="py-20 bg-gray-50 dark:bg-gray-800/50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Upcoming Events</h2>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Event Card 1 -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up">
        <img src="image/OIP (1).jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Live Music Night">
        <h3 class="text-xl font-semibold">Live Music Night</h3>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Join us for a night of soulful live music performances while enjoying our special menu.</p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-sm font-bold text-red-600">25th Aug</span>
          <a href="#" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">Book Now</a>
        </div>
      </div>

      <!-- Event Card 2 -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
        <img src="image/OIP (2).jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Cooking Workshop">
        <h3 class="text-xl font-semibold">Cooking Workshop</h3>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Learn from our chefs as they demonstrate signature dishes. Limited seats available!</p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-sm font-bold text-red-600">30th Aug</span>
          <a href="#" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">Reserve Spot</a>
        </div>
      </div>

      <!-- Event Card 3 -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-4 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
        <img src="image/pic4.jpeg" class="w-full h-48 object-cover rounded-xl mb-4" alt="Festive Special">
        <h3 class="text-xl font-semibold">Festive Special</h3>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Celebrate the festival season with our exclusive themed dishes and offers.</p>
        <div class="flex items-center justify-between mt-4">
          <span class="text-sm font-bold text-red-600">5th Sep</span>
          <a href="#" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">Learn More</a>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Feature/Advertising Section (Opposite Layout) -->
<section id="feature" class="py-20 bg-gradient-to-r from-pink-100 via-yellow-100 to-green-100 dark:from-pink-900 dark:via-purple-900 dark:to-indigo-900 transition-colors duration-500">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Text Content (Now on Left) -->
      <div class="order-last md:order-first">
        <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800 dark:text-white">
          Our Restaurant interior ⭐🤩😍!
        </h3>
        <p class="text-gray-700 dark:text-gray-200 mb-6 text-lg">
          We provide a cozy and aesthetic environment for birthdays, anniversaries, and special events. Book your table and make memories that last forever.
        </p>
        <!-- <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
          Book Now -->
        </button>
      </div>

      <!-- Image with smooth floating effect (Now on Right) -->
      <div class="mx-auto w-64 md:w-96 order-first md:order-last">
        <img src="image/interior.jpeg" 
             alt="Feature" 
             class="w-full h-full object-cover rounded-2xl shadow-xl animate-float">
      </div>

    </div>
  </div>
</section>

<!-- Tailwind Custom Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 6s ease-in-out infinite;
}
</style>

<!-- Add this CSS inside your <style> or Tailwind config -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 3s ease-in-out infinite;
}
</style>




<!-- Animated Gallery -->
<section id="gallery" class="relative py-20 bg-gradient-to-r from-amber-50 via-rose-50 to-emerald-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-12 text-amber-800 dark:text-emerald-300">
      Our Gallery
    </h2>

    <div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden">
      <!-- Images Container -->
      <div id="gallery-slideshow" class="absolute inset-0 flex items-center justify-center">
        <img src="image/front.jpeg" class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 1">
        <img src="image/OIP (1).jpeg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 2">
        <img src="image/front.jpeg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 3">
        <img src="image/offer.jpg" class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 4">
        <img src="image/boy.jpg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 5">
        <img src="image/party.jpg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 6">
        <img src="image/front.jpeg" class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 7">
        <img src="image/girl.jpg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 8">
        <img src="image/birthday.jpg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 9">
        <img src="image/pic1.jpeg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 6">
        <img src="image/pic5.jpeg" class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 7">
        <img src="image/OIP (1).jpeg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 8">
        <img src="image/front.jpeg"   class="gallery-img absolute opacity-0 scale-50 transition-all duration-1000 ease-in-out rounded-3xl shadow-2xl" alt="Dish 9">
      </div>
    </div>
  </div>
</section>

<style>
/* Active Image Effect */
.gallery-img.active {
  opacity: 1 !important;
  transform: scale(1) !important;
  z-index: 10;
}
.gallery-img.prev {
  opacity: 0 !important;
  transform: scale(0.5) translateX(-400px) rotate(-10deg) !important;
  z-index: 5;
}
.gallery-img.next {
  opacity: 0 !important;
  transform: scale(0.5) translateX(400px) rotate(10deg) !important;
  z-index: 5;
}
</style>

<script>
const images = document.querySelectorAll("#gallery-slideshow .gallery-img");
let current = 0;

function showImage(index) {
  images.forEach((img, i) => {
    img.classList.remove("active", "prev", "next");
    if (i === index) {
      img.classList.add("active");
    } else if (i === (index - 1 + images.length) % images.length) {
      img.classList.add("prev");
    } else if (i === (index + 1) % images.length) {
      img.classList.add("next");
    }
  });
}

function nextImage() {
  current = (current + 1) % images.length;
  showImage(current);
}

showImage(current);
setInterval(nextImage, 4000); // 4 sec delay
</script>





<!-- Upcoming Mobile App Section -->
<section class="relative py-24 bg-gradient-to-r from-amber-100 via-rose-100 to-emerald-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

    <!-- Text Content -->
    <div class="text-center md:text-left space-y-6">
      <h2 class="text-4xl md:text-5xl font-extrabold text-amber-900 dark:text-emerald-300">
        📱 Our Mobile App is Coming Soon!
      </h2>
      <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
        Manage your restaurant orders, track deliveries, and explore dishes with just a tap.  
        Our upcoming mobile app will bring the full restaurant experience to your pocket.
      </p>
      <div class="space-x-4">
        <a href="#" class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition-transform transform hover:scale-105">
          Notify Me
        </a>
        <a href="#" class="bg-white dark:bg-gray-700 text-amber-700 dark:text-white px-6 py-3 rounded-xl font-semibold shadow-lg border hover:bg-gray-100 dark:hover:bg-gray-600 transition-transform transform hover:scale-105">
          Learn More
        </a>
      </div>
    </div>

    <!-- Mobile App Mockup -->
    <div class="relative flex justify-center">
      <div class="animate-bounce-slow">
        <img src="image/mobileapp.jpg" alt="Upcoming Mobile App" class="w-64 md:w-80 drop-shadow-2xl rounded-3xl">
      </div>

      <!-- Floating Shapes -->
      <div class="absolute top-0 left-10 w-32 h-32 bg-rose-300 rounded-full opacity-30 animate-float-slow"></div>
      <div class="absolute bottom-0 right-10 w-40 h-40 bg-amber-400 rounded-full opacity-20 animate-float-slow delay-500"></div>
      <div class="absolute top-1/3 right-0 w-28 h-28 bg-emerald-300 rounded-full opacity-25 animate-float-slow delay-300"></div>
    </div>
  </div>
</section>

<style>
@keyframes floatSlow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
.animate-float-slow {
  animation: floatSlow 20s ease-in-out infinite;
}
.animate-bounce-slow {
  animation: bounce 4s infinite;
}
</style>













  <!-- Chefs - Single Row Scrollable -->
<section id="chefs" class="py-20 bg-gray-50 dark:bg-gray-800/50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Our Restaurant Chefs</h2>
    <div class="flex gap-6 overflow-x-auto scrollbar-hide">
      <!-- Chef card template -->
      <div class="min-w-[16rem] bg-white dark:bg-gray-800 rounded-2xl shadow p-4 text-center" data-aos="fade-up">
        <img src="image/OIP (3).jpeg" alt="Chef" class="w-full h-48 object-cover rounded-xl">
        <h3 class="text-lg font-semibold mt-3">Chef Sonu</h3>
        <p class="text-gray-600 dark:text-gray-300">pizza ( Margherita/ pepperoni/ veggie supreme)</p>
        <p class="text-gray-600 dark:text-gray-300">10+ years of experience</p>
      </div>
      <div class="min-w-[16rem] bg-white dark:bg-gray-800 rounded-2xl shadow p-4 text-center" data-aos="fade-up" data-aos-delay="100">
        <img src="image/OIP (3).jpeg" alt="Chef" class="w-full h-48 object-cover rounded-xl">
        <h3 class="text-lg font-semibold mt-3">Chef Sanjan</h3>
        <p class="text-gray-600 dark:text-gray-300">10+ years of experience</p>
        <p class="text-gray-600 dark:text-gray-300">French fries / Burger /Chowmein</p>
      </div>
      <div class="min-w-[16rem] bg-white dark:bg-gray-800 rounded-2xl shadow p-4 text-center" data-aos="fade-up" data-aos-delay="200">
        <img src="image/OIP (3).jpeg" alt="Chef" class="w-full h-48 object-cover rounded-xl">
        <h3 class="text-lg font-semibold mt-3">Chef Aman</h3>
        <p class="text-gray-600 dark:text-gray-300">11+ years experience</p>
        <p class="text-gray-600 dark:text-gray-300">sushi</p>
      </div>
      <div class="min-w-[16rem] bg-white dark:bg-gray-800 rounded-2xl shadow p-4 text-center" data-aos="fade-up" data-aos-delay="300">
        <img src="image/OIP (3).jpeg" alt="Chef" class="w-full h-48 object-cover rounded-xl">
        <h3 class="text-lg font-semibold mt-3">Chef Shivam</h3>
        <p class="text-gray-600 dark:text-gray-300">10+ years experience</p>
        <p class="text-gray-600 dark:text-gray-300">Biryani /Rajma chawal </p>
      </div>
      <div class="min-w-[16rem] bg-white dark:bg-gray-800 rounded-2xl shadow p-4 text-center" data-aos="fade-up" data-aos-delay="400">
        <img src="image/OIP (3).jpeg" alt="Chef" class="w-full h-48 object-cover rounded-xl">
        <h3 class="text-lg font-semibold mt-3">Chef Roushan</h3>
        <p class="text-gray-600 dark:text-gray-300">+5 years experience</p>
        <p class="text-gray-600 dark:text-gray-300">Indian(shahi paneer / chole bhature/ idli sambhar/ palak paneer)</p>
      </div>
    </div>
  </div>
</section>










<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-red-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">What Our Customers Say</h2>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Testimonial Card -->
      <div class="bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition duration-500">
        <div class="flex items-center mb-4">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer 1" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Rohit Sharma</h4>
            <span class="text-yellow-500">★★★★★</span>
          </div>
        </div>
        <p class="text-gray-600">"Amazing food and excellent service! The birthday celebration setup was perfect."</p>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition duration-500">
        <div class="flex items-center mb-4">
          <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Customer 2" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Anika Verma</h4>
            <span class="text-yellow-500">★★★★☆</span>
          </div>
        </div>
        <p class="text-gray-600">"Loved the ambience and the food was super tasty. Highly recommend!"</p>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition duration-500">
        <div class="flex items-center mb-4">
          <img src="https://randomuser.me/api/portraits/men/50.jpg" alt="Customer 3" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Arjun Singh</h4>
            <span class="text-yellow-500">★★★★★</span>
          </div>
        </div>
        <p class="text-gray-600">"Best place to celebrate birthdays! The chefs and staff were amazing."</p>
      </div>
    </div>
  </div>
</section>










<!-- Feature/Importance Section -->
<section id="features" class="py-20 bg-gradient-to-r from-yellow-50 via-pink-50 to-purple-50 dark:from-gray-900 dark:via-purple-900 dark:to-indigo-900 transition-colors duration-500">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- Text Content -->
      <div>
        <h3 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 dark:text-white">
          Why Choose Our Restaurant?
        </h3>
        <p class="text-gray-700 dark:text-gray-200 mb-6 text-lg">
          Experience top-notch services: reservation booking, live order tracking, birthday celebrations, special events, and a cozy environment for your family and friends.
        </p>
         <a href="reservation.php" class="bg-white text-amber-800 px-8 py-3 rounded-xl font-semibold hover:bg-red-300 transition">Reserve Table</a>
         <a href="backend/menu.php" class="bg-white text-amber-800 px-8 py-3 rounded-xl font-semibold hover:bg-yellow-300 transition">Order Now </a>
      </div>

      <!-- Floating Images -->
      <div class="flex justify-center gap-6">
        <img src="image/cel2.jpeg" alt="Facility 1" class="w-48 h-48 object-cover rounded-2xl shadow-xl animate-float">
        <img src="image/pic3.jpeg" alt="Facility 2" class="w-48 h-48 object-cover rounded-2xl shadow-xl animate-float delay-200">
        <img src="image/pic5.jpeg" alt="Facility 3" class="w-48 h-48 object-cover rounded-2xl shadow-xl animate-float delay-400">
        <img src="image/pic2.jpeg" alt="Facility 4" class="w-48 h-48 object-cover rounded-2xl shadow-xl animate-float delay-600">
      </div>

    </div>
  </div>
</section>

<!-- Floating Animation -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-float {
  animation: float 4s ease-in-out infinite;
}
.delay-200 { animation-delay: 0.2s; }
.delay-400 { animation-delay: 0.4s; }
.delay-600 { animation-delay: 0.6s; }
</style>








<!-- Feedback Section -->
<section id="feedback" class="py-20 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 dark:from-gray-900 dark:via-gray-800 dark:to-black">
  <div class="max-w-3xl mx-auto px-6 text-center">
    
    <!-- Title -->
    <h2 class="text-4xl font-extrabold text-white drop-shadow-lg mb-4 animate__animated animate__fadeInUp">
      💬 We Value Your <span class="text-yellow-300">Feedback</span>
    </h2>
    <p class="text-white/80 mb-10 animate__animated animate__fadeIn animate__delay-1s">
      Tell us about your experience at <b>RestoManage</b>.  
      Your opinion helps us improve!
    </p>

    <!-- Feedback Form -->
    <form action="backend/save_feedback.php" method="POST" class="backdrop-blur-lg bg-white/20 dark:bg-white/10 rounded-2xl p-8 shadow-2xl animate__animated animate__fadeInUp animate__delay-2s">
      
      <!-- Star Rating -->
      <div class="flex justify-center mb-6 space-x-2" id="starRating">
        <input type="hidden" name="rating" id="ratingInput" value="0">
        <span class="text-3xl cursor-pointer text-white hover:text-yellow-400">★</span>
        <span class="text-3xl cursor-pointer text-white hover:text-yellow-400">★</span>
        <span class="text-3xl cursor-pointer text-white hover:text-yellow-400">★</span>
        <span class="text-3xl cursor-pointer text-white hover:text-yellow-400">★</span>
        <span class="text-3xl cursor-pointer text-white hover:text-yellow-400">★</span>
      </div>

      <!-- Feedback Input -->
      <textarea name="message" rows="4" placeholder="Write your feedback here..." required
        class="w-full px-4 py-3 mb-6 rounded-xl bg-white/30 dark:bg-gray-700 text-white placeholder-white/70 focus:ring-2 focus:ring-yellow-400 outline-none shadow-md transition"></textarea>

      <!-- Submit Button -->
      <button type="submit"
        class="px-8 py-3 text-lg font-bold text-white bg-gradient-to-r from-yellow-400 via-red-500 to-pink-600 rounded-xl shadow-lg hover:scale-105 transition transform animate__animated animate__pulse animate__infinite">
        🚀 Submit Feedback
      </button>
    </form>
  </div>
</section>

<!-- Star Rating Script -->
<script>
  const stars = document.querySelectorAll("#starRating span");
  const ratingInput = document.getElementById("ratingInput");
  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      ratingInput.value = index + 1; // rating set
      stars.forEach((s, i) => {
        s.style.color = i <= index ? "gold" : "white";
      });
    });
  });
</script>










<!-- Contact Us Section -->
<section id="contact" class="py-20 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 dark:text-white mb-12">
      Contact Us
    </h2>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-3xl p-8 md:p-12">
      <form action="#" method="POST" class="space-y-6">

        <!-- Name -->
        <div>
          <label for="name" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
            Name
          </label>
          <input type="text" name="name" id="name" placeholder="Your Name"
                 class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-600 transition">
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
            Email
          </label>
          <input type="email" name="email" id="email" placeholder="you@example.com"
                 class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-600 transition">
        </div>

        <!-- Message -->
        <div>
          <label for="message" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
            Message
          </label>
          <textarea name="message" id="message" rows="5" placeholder="Write your message..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-600 transition"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" 
                  class="bg-red-600 text-white px-8 py-3 rounded-xl hover:bg-red-700 transition duration-300 font-semibold">
            Send Message
          </button>
        </div>

      </form>
    </div>
  </div>
</section>












<!-- CTA - Reservation -->
<section class="bg-gradient-to-r from-amber-800 via-orange-700 to-yellow-600 text-white text-center py-20 relative overflow-hidden">
  <div class="max-w-4xl mx-auto px-6 relative z-10">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Book Your Table Now!</h2>
    <p class="mb-6 text-lg opacity-90">A perfect dining experience is just one click away. Don’t wait, reserve your seat today.</p>
    <a href="reservation.php" class="bg-white text-amber-800 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">Reserve Table</a>
  </div>
  <!-- floating decor -->
  <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
  <div class="absolute bottom-0 right-0 w-80 h-80 bg-yellow-200/20 rounded-full blur-2xl animate-bounce"></div>
</section>







<section class="bg-gradient-to-r from-teal-500 via-green-500 to-lime-400 text-white py-16 text-center">
  <h2 class="text-4xl md:text-5xl font-bold mb-4">💡 Our Supportive Spirit</h2>
  <p class="text-lg max-w-2xl mx-auto mb-6">
    In every challenge, our team stands together.  
    Without their support, this project would just remain an idea.
  </p>
  <a href="ourteam.html">
  <button class="bg-white text-green-700 font-semibold px-6 py-3 rounded-full shadow-md hover:scale-105 transition">
    Know More
  </button></a>
</section>







<!-- <section class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-400 text-white py-16 text-center">
  <h2 class="text-4xl md:text-5xl font-bold mb-4">🔥 Work With Passion</h2>
  <p class="text-lg max-w-2xl mx-auto mb-6">
    Every milestone we achieve is powered by our team's dedication and support.  
    Together, we create something extraordinary.
  </p>
  <a href="ourteam.html">
  <button class="bg-white text-orange-700 font-semibold px-6 py-3 rounded-full shadow-md hover:scale-105 transition">
    Join the Journey
  </button></a>
</section> -->










<!-- Footer Section with Map & YouTube -->
<footer class="bg-gray-900 text-gray-300 py-16">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

    <!-- About / Logo -->
    <div>
      <h2 class="text-2xl font-bold text-white mb-4">RestoManage</h2>
      <p class="text-gray-400">
        Cozy and aesthetic place for your special celebrations, birthdays, and events. Experience the best dishes and atmosphere.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Quick Links</h3>
      <ul class="space-y-2">
        <li><a href="#specials" class="hover:text-red-500 transition">Special Dishes</a></li>
        <li><a href="#chefs" class="hover:text-red-500 transition">Our Chefs</a></li>
        <li><a href="#feature" class="hover:text-red-500 transition">Features</a></li>
        <li><a href="#events" class="hover:text-red-500 transition">Events</a></li>
        <li><a href="#birthday" class="hover:text-red-500 transition">Birthday Special</a></li>
      </ul>
    </div>

    <!-- Contact / Map -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Visit Us</h3>
      <p class="text-gray-400 mb-2">Mohania, Kaimur, Bihar, India</p>
      <!-- Google Map Embed -->
      <div class="rounded-xl overflow-hidden shadow-lg">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.123456789!2d83.5067!3d24.9308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e5b2a5f0d45f3%3A0xabcdef1234567890!2sMohania%2C%20Kaimur%2C%20Bihar%2C%20India!5e0!3m2!1sen!2sin!4v1692592345678!5m2!1sen!2sin" 
          width="100%" 
          height="180" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Social Media + YouTube -->
    <div>
      <h3 class="font-semibold mb-4 text-white">Follow Us</h3>
      <div class="flex items-center gap-4 mb-4">
        <a href="#" class="hover:text-pink-500 transition">
          <!-- Instagram Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm4.75-.25a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-blue-500 transition">
          <!-- Twitter Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.46 6c-.77.35-1.6.59-2.46.69a4.3 4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72 1.04 4.28 4.28 0 0 0-7.29 3.9 12.16 12.16 0 0 1-8.83-4.47 4.28 4.28 0 0 0 1.32 5.71 4.23 4.23 0 0 1-1.94-.54v.05a4.28 4.28 0 0 0 3.44 4.19 4.3 4.3 0 0 1-1.93.07 4.28 4.28 0 0 0 3.99 2.97A8.57 8.57 0 0 1 2 19.54a12.1 12.1 0 0 0 6.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.38-.01-.57A8.7 8.7 0 0 0 24 5.5a8.52 8.52 0 0 1-2.54.7z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-red-600 transition">
          <!-- YouTube Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19.615 3.184c-.694-.66-1.57-.835-3.44-.835H7.825c-1.87 0-2.746.175-3.44.835C3.09 3.85 3 4.66 3 6.634v10.732c0 1.974.09 2.784.885 3.45.694.66 1.57.835 3.44.835h8.35c1.87 0 2.746-.175 3.44-.835.795-.666.885-1.476.885-3.45V6.634c0-1.974-.09-2.784-.885-3.45zM10 15V9l5 3-5 3z"/>
          </svg>
        </a>
      </div>
    </div>

  </div>

  <div class="mt-12 text-center text-gray-500 text-sm">
    &copy; 2025 Restaurant Name. All rights reserved.
  </div>
</footer>






  <!-- AOS + Custom JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="script.js"></script>
</body>
</html>
