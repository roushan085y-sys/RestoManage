<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Successful</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 flex items-center justify-center min-h-screen">

  <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl p-10 max-w-lg text-center animate-fadeIn">
    
    <!-- Success Icon -->
    <div class="mx-auto bg-green-100 dark:bg-green-800 rounded-full w-28 h-28 flex items-center justify-center mb-6 animate-bounce">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>

    <!-- Heading -->
    <h1 class="text-3xl md:text-4xl font-bold text-green-700 dark:text-green-400 mb-2">
      Order Confirmed 🎉
    </h1>
    <p class="text-gray-600 dark:text-gray-300 mb-6">
      Thank you for ordering with us!  
      Your order has been placed successfully.
    </p>

    <!-- Order Info -->
    <!-- <div class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-6 text-left">
      <p class="text-gray-700 dark:text-gray-300"><strong>Order ID:</strong> #12345</p>
      <p class="text-gray-700 dark:text-gray-300"><strong>Estimated Delivery:</strong> 30-40 mins</p>
    </div>

    Buttons
    <div class="flex gap-4 justify-center">
      <a href="tracking.html" class="px-5 py-2 rounded-xl bg-green-600 text-white hover:bg-green-700 transition shadow-md">Track Order</a>
      <a href="index.html" class="px-5 py-2 rounded-xl bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-400 dark:hover:bg-gray-600 transition shadow-md">Back to Home</a>
    </div> -->
  </div>

  <!-- Animation -->
  <script>
    // Confetti Firework
    setTimeout(() => {
      confetti({
        particleCount: 120,
        spread: 80,
        origin: { y: 0.6 }
      });
    }, 500);
  </script>

  <!-- Extra Style -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease-out;
    }
  </style>
</body>
</html>
