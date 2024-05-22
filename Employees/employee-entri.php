<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:../login.php');
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
                <a href="employee.php" class="active">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Employe</span>
                </a>
            </li>
            <li>
                <a href="../Jobs/job.php">
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
            <h3>Input Data Karyawan</h3>
            <div class="form-login">
			<form action="employee-proses.php" method="post" enctype="multipart/form-data">
                <label for="photo">Foto Karyawan</label><br>
                <input type="file" name="photo" id="Photo" style="margin-bottom: 20px" /><br>
                <label for="employee">Nama Karyawan</label>
                <input class="input" type="text" name="nama" id="Nama_Lengkap" placeholder="Nama Karyawan" />
                <label for="employee">Jenis Kelamin</label>
                <input class="input" type="text" name="jk" id="Jenis_Kelamin" placeholder="Jenis Kelamin" />
                <label for="employee">Telp Karyawan</label>
                <input class="input" type="text" name="telp" id="No_Telp" placeholder="Telp Karyawan" />
                <label for="employee">Alamat Karyawan</label>
                <input class="input" type="text" name="alamat" id="Alamat" placeholder="Alamat" />
                <label for="employee">Pendidikan Terakhir</label>
                <input class="input" type="text" name="pendidikan" id="Pendidikan_Terakhir" placeholder="Pendidikan" />
                <label for="employee">Keahlian</label>
                <input class="input" type="text" name="keahlian" id="Keahlian" placeholder="Keahlian" />
                <button type="submit" class="btn btn-simpan" name="simpan">
                    Simpan
                </button>
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