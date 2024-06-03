<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
            <h3>Input Data Perusahaan</h3>
            <div class="form-login">
                <form action="job-proses.php" method="post" enctype="multipart/form-data">
                    <label for="Nama_Perusahaan">Nama Perusahaan</label>
                    <input class="input" type="text" name="Nama_Perusahaan" id="Nama_Perusahaan" placeholder="Nama Perusahaan" required />
                    <label for="Nama_Pekerjaan">Nama Pekerjaan</label>
                    <input class="input" type="text" name="Nama_Pekerjaan" id="Nama_Pekerjaan" placeholder="Nama Pekerjaan" required />
                    <label for="Deskripsi">Deskripsi</label>
                    <input class="input" type="text" name="Deskripsi" id="Deskripsi" placeholder="Deskripsi" required />
                    <label for="Syarat">Syarat</label>
                    <input class="input" type="text" name="Syarat" id="Syarat" placeholder="Syarat" required />
                    <label for="Gaji">Gaji</label>
                    <input class="input" type="number" name="Gaji" id="Gaji" placeholder="Gaji" required />
                    <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
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