<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_perusahaan = $_POST['Nama_Perusahaan'];
    $nama_pekerjaan = $_POST['Nama_Pekerjaan'];
    $deskripsi = $_POST['Deskripsi'];
    $syarat = $_POST['Syarat'];
    $gaji = $_POST['Gaji'];

    if (empty($nama_perusahaan) || empty($nama_pekerjaan) || empty($deskripsi) || empty($syarat) || empty($gaji)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'job-entri.php';
            </script>
        ";
        return false;
    }

    $stmt = $koneksi->prepare("INSERT INTO jobs (Nama_Perusahaan, Nama_Pekerjaan, Deskripsi, Syarat, Gaji) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $nama_perusahaan, $nama_pekerjaan, $deskripsi, $syarat, $gaji);

    if ($stmt->execute()) {
        echo "
            <script>
                alert('Data Jobs Berhasil Ditambahkan');
                window.location = 'job.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'job-entri.php';
            </script>
        ";
    }

    $stmt->close();
} elseif (isset($_POST['edit'])) {
    $id = $_POST['ID_Jobs'];
    $nama_perusahaan = $_POST['Nama_Perusahaan'];
    $nama_pekerjaan = $_POST['Nama_Pekerjaan'];
    $deskripsi = $_POST['Deskripsi'];
    $syarat = $_POST['Syarat'];
    $gaji = $_POST['Gaji'];

    $stmt = $koneksi->prepare("UPDATE jobs SET Nama_Perusahaan = ?, Nama_Pekerjaan = ?, Deskripsi = ?, Syarat = ?, Gaji = ? WHERE ID_Jobs = ?");
    $stmt->bind_param("ssssdi", $nama_perusahaan, $nama_pekerjaan, $deskripsi, $syarat, $gaji, $id);

    if ($stmt->execute()) {
        echo "
            <script>
                alert('Data Jobs Berhasil Diubah');
                window.location = 'job.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'job-edit.php?ID_Jobs=$id';
            </script>
        ";
    }

    $stmt->close();
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['ID_Jobs'];

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
}
?>