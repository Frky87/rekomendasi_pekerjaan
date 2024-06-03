<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

include '../koneksi.php';

if (!isset($_GET['ID_Jobs'])) {
    echo "
        <script>
            alert('Tidak ada ID yang Terdeteksi');
            window.location = 'job.php';
        </script>
    ";
    exit();
}

$id = $_GET['ID_Jobs'];

$sql = "SELECT * FROM jobs WHERE ID_Jobs = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
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
            <h3>Edit Data Perusahaan</h3>
            <div class="form-login">
                <form action="job-proses.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ID_Jobs" value="<?= $data['ID_Jobs'] ?>" />
                    <label for="Nama_Perusahaan">Nama Perusahaan</label>
                    <input class="input" type="text" name="Nama_Perusahaan" id="Nama_Perusahaan" placeholder="Nama Perusahaan" value="<?= $data['Nama_Perusahaan'] ?>" required />
                    <label for="Nama_Pekerjaan">Nama Pekerjaan</label>
                    <input class="input" type="text" name="Nama_Pekerjaan" id="Nama_Pekerjaan" placeholder="Nama Pekerjaan" value="<?= $data['Nama_Pekerjaan'] ?>" required />
                    <label for="Deskripsi">Deskripsi</label>
                    <input class="input" type="text" name="Deskripsi" id="Deskripsi" placeholder="Deskripsi" value="<?= $data['Deskripsi'] ?>" required />
                    <label for="Syarat">Syarat</label>
                    <input class="input" type="text" name="Syarat" id="Syarat" placeholder="Syarat" value="<?= $data['Syarat'] ?>" required />
                    <label for="Gaji">Gaji</label>
                    <input class="input" type="number" name="Gaji" id="Gaji" placeholder="Gaji" value="<?= $data['Gaji'] ?>" required />
                    <button type="submit" class="btn btn-simpan" name="edit">Edit</button>
                </form>
            </div>
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
