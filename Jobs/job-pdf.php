<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

require '../vendor/autoload.php';
use Dompdf\Dompdf;

include '../koneksi.php';

// Buat instance dari DOMPDF
$dompdf = new Dompdf();

// Ambil data dari database
$sql = "SELECT * FROM jobs";
$result = mysqli_query($koneksi, $sql);

// Buat HTML untuk PDF
$html = '<h3>Daftar Data Perusahaan</h3>
         <table border="1" width="100%" style="border-collapse: collapse;">
             <thead>
                 <tr>
                     <th>Nama Perusahaan</th>
                     <th>Nama Pekerjaan</th>
                     <th>Deskripsi</th>
                     <th>Syarat</th>
                     <th>Gaji</th>
                 </tr>
             </thead>
             <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . htmlspecialchars($row['Nama_Perusahaan']) . '</td>
                <td>' . htmlspecialchars($row['Nama_Pekerjaan']) . '</td>
                <td>' . htmlspecialchars($row['Deskripsi']) . '</td>
                <td>' . htmlspecialchars($row['Syarat']) . '</td>
                <td>' . htmlspecialchars($row['Gaji']) . '</td>
              </tr>';
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
$dompdf->stream('Daftar_Data_Perusahaan.pdf', array("Attachment" => 0)); // 1 untuk unduh otomatis, 0 untuk pratinjau di browser
?>