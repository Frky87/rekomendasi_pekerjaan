<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

include '../koneksi.php';

if (isset($_GET['ID_Jobs'])) {
    $id = $_GET['ID_Jobs'];

    $stmt = $koneksi->prepare("DELETE FROM jobs WHERE ID_Jobs = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "
            <script>
                alert('Data Jobs Berhasil Dihapus');
                window.location = 'job.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'job.php';
            </script>
        ";
    }

    $stmt->close();
} else {
    echo "
        <script>
            alert('Tidak ada ID yang Terdeteksi');
            window.location = 'job.php';
        </script>
    ";
}
?>