<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi JobsJive</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>
    <div class="container">
        <!-- BEGIN: Mengubah form menjadi anak dari div -->
        <form action="login.php" method="post">
            <h2>Register</h2>
            <div class="input-container">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" placeholder="Username" id="username" required>
            </div>
            <div class="input-container">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" id="email" required>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" placeholder="Phone Number" id="phone" required>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="register-btn">
                <a href="login.php">Register</a>
            </div>
            <br>
            <p>sign in with social networks</p>
            <div class="social-icons">
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
        </form>
        <!-- END: Mengubah form menjadi anak dari div -->
    </div>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>