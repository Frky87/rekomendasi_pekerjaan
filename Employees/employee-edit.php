<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

if(!isset($_GET['ID_Employee'])) {
    echo "
        <script>
            alert('Tidak ada ID yang Terdeteksi');
            window.location = 'employee.php';
        </script>
    ";
    exit;
}

$id = $_GET['ID_Employee'];

$sql = "SELECT * FROM employee WHERE ID_Employee = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

if(!$data) {
    echo "
        <script>
            alert('ID Kasus tidak ditemukan');
            window.location = 'employee.php';
        </script>
    ";
    exit;
}
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
		<span class="admin_name">JobsJive Admin</span>
	   </div>
	</nav>
	<div class="home-content">
	   <h3>Edit Data Karyawan</h3>
	   <div class="form-login">
		<form
              action="employee-proses.php"
              method="post"
              enctype="multipart/form-data"
            >
               <input type="hidden" name="ID_Employee" value="<?= $data['ID_Employee'] ?>">
               <input type="hidden" name="photoLama" value="<?= $data['Photo'] ?>">
               <label for="Photo">Photo</label><br>
               <img src="../assets/<?= $data['Photo'] ?>" alt="" width="200px"><br>
               <input
                 type="file"
                 name="photo"
                 id="Photo"
                 style="margin-bottom: 20px"
               /><br>
               <label for="employee">Nama Karyawan</label>
               <input
                 class="input"
                 type="text"
                 name="nama"
                 id="Nama_Lengkap"
                 placeholder="Nama Karyawan"
                 value="<?= $data['Nama_Lengkap'] ?>"
               />
               <label for="employee">Jenis Kelamin</label>
               <input
                 class="input"
                 type="text"
                 name="jk"
                 id="Jenis_Kelamin"
                 placeholder="Jenis Kelamin"
                 value="<?= $data['Jenis_Kelamin']?>"
               />
                <label for="employee">Telp Karyawan</label>
                <input
                  class="input"
                  type="text"
                  name="telp"
                  id="No_Telp"
                  placeholder="Telp Karyawan"
                  value="<?= $data['No_Telp']?>"
                />
                <label for="employee">Alamat Karyawan</label>
                <input
                  class="input"
                  type="text"
                  name="alamat"
                  id="Alamat"
                  placeholder="Alamat"
                  value="<?= $data['Alamat']?>"
                />
                <label for="employee">Pendidikan Terakhir</label>
                <input
                  class="input"
                  type="text"
                  name="pendidikan"
                  id="Pendidikan_Terakhir"
                  placeholder="Pendidikan"
                  value="<?= $data['Pendidikan_Terakhir']?>"
                />
                <label for="employee">Keahlian</label>
                <input
                  class="input"
                  type="text"
                  name="keahlian"
                  id="Keahlian"
                  placeholder="Keahlian"
                  value="<?= $data['Keahlian']?>"
                />
               <button type="submit" class="btn btn-simpan" name="edit">
                 Edit
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
