<?php
session_start();

// Cek apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $validUsername = "admin";
  $validPassword = "12345";

  if ($username === "" || $password === "") {
    echo "<script>alert('Isi semua data terlebih dahulu.');</script>";
  } elseif ($username === $validUsername && $password === $validPassword) {
    // Simpan username ke session
    $_SESSION['username'] = $username;
    setcookie('username', $username, time() + (86400 * 30), '/'); // Set cookie dengan nama 'username' dan nilai username pengguna
    echo "<script>alert('Login berhasil!'); window.location.href = 'dashboard.php';</script>";
    exit();
  } else {
    echo "<script>alert('Username atau password salah.'); window.location.href = 'login.php';</script>";
    exit();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login JobsJive</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="post"> <!-- Perbaikan: action -->
            <h2>Login</h2>
            <div class="input-container">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" placeholder="Username" id=""> <!-- Perbaikan: name -->
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" id=""> <!-- Perbaikan: name -->
                <i class="fa-regular fa-eye-slash"></i>
            </div>

            <a href="#" class="forget">Forget Password</a> <!-- Perbaikan: href -->

            <div class="login-btn">
                <button type="submit">Login</button> <!-- Perbaikan: Mengubah anchor tag menjadi button -->
            </div>

            <div class="sign-in-btn">
                <a href="register.php">Sign Up</a>
            </div>

            <p>sign in with social networks</p>
            <div class="social-icons">
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
   
</body>

</html>
