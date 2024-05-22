<?php
include 'koneksi.php';

$query = "SELECT id_role, nama_role FROM role";
$result = mysqli_query($koneksi, $query);
?>
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
        <form action="register-proses.php" method="post">
            <h2>Register</h2>
            <div class="input-container">
                <i class="fa-regular fa-envelope"></i>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-container">
                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-key"></i>
                <select class="form-control" id="role_name" name="role_name" required>
                    <option value="">Pilih Role</option>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='" . $row['id_role'] . "'>" . $row['nama_role'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button class="register-btn" type="submit" name="register">Register</button><br>
            <br>
            <p>sign in with social networks</p>
            <div class="social-icons">
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
