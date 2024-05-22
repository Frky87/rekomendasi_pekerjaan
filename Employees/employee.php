<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location:../login.php');
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
                <span class="admin_name">JobsJive</span>
            </div>
        </nav>
        <!-- Isi dari halaman -->
        <div class="home-content">
            <h3>Data Karyawan</h3>
            <button type="button" class="btn btn-tambah">
          <a href="employee-entri.php">Tambah Data</a>
        </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%">Photo</th>
                        <th>Nama</th>
                        <th scope="col" style="width: 5%">Jenis Kelamin</th>
                        <th scope="col" style="width: 10%">No Telp</th>
                        <th scope="col" style="width: 10%">Alamat</th>
                        <th scope="col" style="width: 20%">Pendidikan Terakhir</th>
                        <th scope="col" style="width: 20%">Keahlian</th>
                        <th scope="col" style="width: 30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					include '../koneksi.php';
					$sql = "SELECT * FROM employee";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
                            <tr>
                                <td colspan='10' align='center'>
                                        Data Kosong
                                        </td>
                            </tr>
                        ";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
                      <td>
                        <img src='../assets/$data[Photo]' width='200px'>
                      </td>
                      <td>$data[Nama_Lengkap]</td>
                      <td>$data[Jenis_Kelamin]</td>
                      <td>$data[No_Telp]</td>
                      <td>$data[Alamat]</td>
                      <td>$data[Pendidikan_Terakhir]</td>
					  <td>$data[Keahlian]</td>
                      <td >
                        <a class='btn-edit' href=employee-edit.php?ID_Employee=$data[ID_Employee]>
                               Edit
                        </a> | 
                        <a class='btn-delete' href=employee-delete.php?ID_Employee=$data[ID_Employee]>
                            Hapus
                        </a>
                      </td>
                    </tr>
                  ";
					}
					?>
				</tbody>
			</table>
		</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};
	</script>
</body>

</html>