<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $id_role = $_POST['role_name'];

    // Validasi untuk memastikan tidak ada field yang kosong
    if (empty($email) || empty($username) || empty($password) || empty($id_role)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    } else {
        // Menggunakan prepared statements untuk mencegah SQL Injection
        $stmt = $koneksi->prepare("INSERT INTO admin (email, username, password, id_role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $email, $username, $password, $id_role);

        if ($stmt->execute()) {
            echo "
                <script>
                    alert('Registrasi Berhasil Silahkan login');
                    window.location = 'login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan: " . $stmt->error . "');
                    window.location = 'register.php';
                </script>
            ";
        }
        $stmt->close();
    }
} else {
    echo "
        <script>
            alert('Terjadi Kesalahan');
            window.location = 'register.php';
        </script>
    ";
}

$koneksi->close();
?>
