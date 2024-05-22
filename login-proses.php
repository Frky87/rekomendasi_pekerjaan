<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $requestUsername = mysqli_real_escape_string($koneksi, $_POST['username']);
    $requestPassword = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$requestUsername'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($requestPassword, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php');
            exit();
        } else {
            echo "
            <script>
                alert('Username atau password Anda salah. Silakan coba lagi.');
                window.location = 'login.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Username atau password Anda salah. Silakan coba lagi.');
            window.location = 'login.php';
        </script>
        ";
    }
} else {
    header('Location: login.php');
    exit();
}
?>
