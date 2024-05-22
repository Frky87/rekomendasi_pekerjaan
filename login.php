<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login JobsJive</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
	href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
			rel="stylesheet"
		/>
  <link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <main>
        <div class="container">
        <form action="login-proses.php" method="post"> 
            <h2>Login</h2>
            <div class="input-container">
                <i class="fa-regular fa-user"></i>
                <input class="input" type="text" name="username" placeholder="Username" /> <!-- Perbaikan: name -->
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input class="input" type="password" name="password" placeholder="Password" /> <!-- Perbaikan: name -->
                <i class="fa-regular fa-eye-slash"></i>
            </div>

            <a href="#" class="forget">Forget Password</a> <!-- Perbaikan: href -->

            <div class="center">
                <button type="submit" class="login-btn" name="login"  
                      id="login"> Login
		        </button>
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
    </main>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>

</body>

</html>
