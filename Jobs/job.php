<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

include '../koneksi.php';

$sql = "SELECT * FROM jobs";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/image/vas.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/387774990c.js" crossorigin="anonymous"></script>
    <title>JobsJive</title>
</head>
<body>
<div class="sidebar">
        <div class="logo-details" style="align-items: center;">
            <img src="../assets/jobjiv.png" alt="logo" width="60">
            <span class="logo_name">JobsJive</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../dashboard.php">
                    <i class="fa-solid fa-border-all"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../Employees/employee.php">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Employee</span>
                </a>
            </li>
            <li>
                <a href="job.php" class="active">
                    <i class="fa-solid fa-suitcase"></i>
                    <span class="links_name">Jobs</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="links_name">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">JobsJive</span>
            </div>
        </nav>

        <!-- Isi dari halaman -->
        <div class="home-content">
            <h3>Daftar Data Perusahaan</h3>
            <button type="button" class="btn btn-tambah">
                <a href="job-entri.php">Tambah Data</a>
            </button>
            <button type="button" class="btn btn-cetak">
                <a href="job-pdf.php" target="_blank">Cetak PDF</a>
            </button>

        </button>
            <table border="1">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%">Nama Perusahaan</th>
                        <th scope="col" style="width: 10%">Nama Pekerjaan</th>
                        <th scope="col" style="width: 20%">Deskripsi</th>
                        <th scope="col" style="width: 30%">Syarat</th>
                        <th scope="col" style="width: 10%">Gaji</th>
                        <th scope="col" style="width: 10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['Nama_Perusahaan'] ?></td>
                            <td><?= $row['Nama_Pekerjaan'] ?></td>
                            <td><?= $row['Deskripsi'] ?></td>
                            <td><?= $row['Syarat'] ?></td>
                            <td><?= $row['Gaji'] ?></td>
                            <td>
                                <a href="job-edit.php?ID_Jobs=<?= $row['ID_Jobs'] ?>">Edit</a> | 
                                <a href="job-delete.php?ID_Jobs=<?= $row['ID_Jobs'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>
</html>