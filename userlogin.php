<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RestoManage | Login & Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #8b5e3c, #d6a77a);
      overflow: hidden;
      position: relative;
      text-align: center;
      color: #fff;
    }

    .circle {
      position: absolute;
      border-radius: 50%;
      opacity: 0.15;
      animation: float 15s linear infinite;
    }

    .circle:nth-child(1) {
      width: 200px;
      height: 200px;
      background: #c19a6b;
      top: 10%;
      left: 15%;
      animation-delay: 0s;
    }

    .circle:nth-child(2) {
      width: 300px;
      height: 300px;
      background: #a0522d;
      top: 50%;
      left: 70%;
      animation-delay: 5s;
    }

    .circle:nth-child(3) {
      width: 150px;
      height: 150px;
      background: #d2b48c;
      top: 80%;
      left: 30%;
      animation-delay: 2s;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-50px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .main-wrapper {
      z-index: 10;
      position: relative;
      max-width: 500px;
    }

    .welcome {
      margin-bottom: 25px;
    }

    .welcome h1 {
      font-size: 2.2rem;
      color: #d7ea6cff;
      margin-bottom: 10px;
      letter-spacing: 1px;
      font-weight: 700;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    .welcome p {
      font-size: 14px;
      color: #f9e5cf;
      margin-bottom: 20px;
      line-height: 1.5;
    }

    .container {
      width: 400px;
      padding: 40px 30px;
      border-radius: 25px;
      background: rgba(60, 30, 10, 0.85);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
      text-align: center;
      transition: 0.5s ease;
      margin: auto;
    }

    h2 {
      color: #f4d1a1;
      margin-bottom: 20px;
      font-weight: 600;
      letter-spacing: 1px;
    }

    input {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border-radius: 15px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      font-size: 16px;
      padding-left: 20px;
      transition: 0.3s;
    }

    input::placeholder {
      color: #f4d1a1;
    }

    input:focus {
      background: rgba(255, 255, 255, 0.2);
    }

    button {
      width: 100%;
      padding: 14px;
      border-radius: 15px;
      border: none;
      background: #c27c5a;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      margin-top: 12px;
      transition: 0.3s;
      font-weight: 600;
    }

    button:hover {
      background: #e3a87b;
    }

    .toggle-link {
      margin-top: 18px;
      color: #f4d1a1;
      cursor: pointer;
      transition: 0.3s;
      font-size: 14px;
    }

    .toggle-link:hover {
      color: #ffe6c2;
    }

    .features {
      margin-top: 25px;
      font-size: 13px;
      color: #ffe7ca;
      line-height: 1.6;
    }

    .features strong {
      color: #ffd08a;
    }
  </style>
</head>

<body>

  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>

  <div class="main-wrapper">
    <!-- ✅ Welcome Heading -->
    <div class="welcome">
      <!-- <h1>🍽️ Welcome to RestoManage</h1> -->
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
        <span id="heroRotatingText" class="block text-amber-400 drop-shadow-lg"></span>
        Welcome to RestoManage Like a Pro
      </h1>
      <!-- <p>Experience the future of smart restaurant management.<br>
        Manage your orders, track reservations, and enjoy delicious food with just a click!</p> -->
    </div>

    <!-- ✅ LOGIN FORM -->
    <div class="container" id="login-container">
      <h2>Login</h2>
      <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <p class="toggle-link" onclick="showSignUp()">Don't have an account? Sign Up</p>
    </div>

    <!-- ✅ SIGNUP FORM -->
    <div class="container" id="signup-container" style="display:none;">
      <h2>Create Account</h2>
      <form method="POST" action="signup.php">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signup">Sign Up</button>
      </form>
      <p class="toggle-link" onclick="showLogin()">Already have an account? Login</p>
    </div>

    <!-- ✅ Features / Highlights -->
    <!-- <div class="features">
      <p><strong>Why RestoManage?</strong><br>
        ✔ Easy Online Reservations <br>
        ✔ Quick Order Tracking <br>
        ✔ Modern & User-Friendly Design <br>
        ✔ Admin & User Dashboard <br>
        ✔ Secure Login System
      </p>
    </div> -->
  </div>

  <script>
    function showSignUp() {
      document.getElementById('login-container').style.display = 'none';
      document.getElementById('signup-container').style.display = 'block';
    }
    function showLogin() {
      document.getElementById('signup-container').style.display = 'none';
      document.getElementById('login-container').style.display = 'block';
    }
  </script>

</body>
</html>
