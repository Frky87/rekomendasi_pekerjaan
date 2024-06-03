<?php
require '../vendor/autoload.php'; // pastikan path sesuai dengan struktur direktori
use Dompdf\Dompdf;

session_start();
if (!isset($_SESSION['username'])) {
    header('location:../login.php');
    exit();
}

include '../koneksi.php';

// Buat instance dari DOMPDF
$dompdf = new Dompdf();

// Ambil data dari database
$sql = "SELECT * FROM employee";
$result = mysqli_query($koneksi, $sql);

// Buat HTML untuk PDF
$html = '<h3>Data Karyawan</h3>
         <table border="1" width="100%" style="border-collapse: collapse;">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Photo</th>
                     <th>Nama</th>
                     <th>Jenis Kelamin</th>
                     <th>No Telp</th>
                     <th>Alamat</th>
                     <th>Pendidikan Terakhir</th>
                     <th>Keahlian</th>
                 </tr>
             </thead>
             <tbody>';

$no = 1;
while ($data = mysqli_fetch_assoc($result)) {
    $photoPath = '../assets/' . htmlspecialchars($data['Photo']); // Path to the photo
    $photoBase64 = '';
    
    if (file_exists($photoPath)) {
        $photoData = file_get_contents($photoPath);
        $photoBase64 = 'data:image/' . pathinfo($photoPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode($photoData);
    }

    $html .= '<tr>
                 <td>' . $no . '</td>
                 <td><img src="' . $photoBase64 . '" width="100"></td>
                 <td>' . htmlspecialchars($data['Nama_Lengkap']) . '</td>
                 <td>' . htmlspecialchars($data['Jenis_Kelamin']) . '</td>
                 <td>' . htmlspecialchars($data['No_Telp']) . '</td>
                 <td>' . htmlspecialchars($data['Alamat']) . '</td>
                 <td>' . htmlspecialchars($data['Pendidikan_Terakhir']) . '</td>
                 <td>' . htmlspecialchars($data['Keahlian']) . '</td>
              </tr>';
    $no++;
}

$html .= '</tbody>
         </table>';

// Load HTML ke DOMPDF
$dompdf->loadHtml($html);

// (Opsional) Set ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');

// Render PDF
$dompdf->render();

// Output PDF
$dompdf->stream('Data_Karyawan.pdf', array("Attachment" => 0)); // 1 untuk unduh otomatis, 0 untuk pratinjau di browser
?>