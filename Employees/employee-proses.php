<?php 
include '../koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name']; // Pastikan 'photo' sesuai dengan name di form
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'employee-entri.php';
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'employee-entri.php';
            </script>
        ";
        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    if (move_uploaded_file($tmpName, '../assets/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        return false;
    }
}

if (isset($_POST['simpan'])) {
    $photo = upload();
    $nama = $_POST['nama']; // Sesuaikan dengan name di form
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $keahlian = $_POST['keahlian'];

    // Pastikan semua data tidak kosong
    if (!$photo || empty($nama) || empty($jk) || empty($telp) || empty($alamat) || empty($pendidikan) || empty($keahlian)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'employee-entri.php';
            </script>
        ";
        return false;
    }

    var_dump($photo, $nama, $jk, $telp, $alamat, $pendidikan, $keahlian);

    // Sesuaikan nama kolom di database jika diperlukan
    $sql = "INSERT INTO employee (Photo, Nama_Lengkap, Jenis_Kelamin, No_Telp, Alamat, Pendidikan_Terakhir, Keahlian) 
            VALUES('$photo', '$nama', '$jk', '$telp', '$alamat', '$pendidikan', '$keahlian')";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Employee Berhasil Ditambahkan');
                window.location = 'employee.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'employee-entri.php';
            </script>
        ";
    }
}elseif (isset($_POST['edit'])) {
    $id = $_POST['ID_Employee'];
    $photoLama = $_POST['photoLama'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $keahlian = $_POST['keahlian'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../assets/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE employee SET 
            Photo = '$photo',
            Nama_Lengkap = '$nama',
            Jenis_Kelamin = '$jk',
            No_Telp = '$telp',
            Alamat = '$alamat',
            Pendidikan_Terakhir = '$pendidikan',
            Keahlian = '$keahlian'
            WHERE ID_Employee = $id
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Employee Berhasil Diubah');
                window.location = 'employee.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'employee-edit.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['ID_Employee'];
    $sql = "DELETE FROM employee WHERE ID_Employee='$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Employee Berhasil Dihapus');
                window.location = 'employee.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'employee.php';
            </script>
        ";
    }
}
?>