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
                    <span class="links_name">Employe</span>
                </a>
            </li>
            <li>
                <a href="job.php" class="active">
                    <i class="fa-solid fa-suitcase"></i>
                    <span class="links_name">Jobs</span>
                </a>
            </li>
            <li>
                <a href="../index.php">
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
            <h3>Data Pekerjaan</h3>
            <button type="button" class="btn btn-tambah">
          <a href="job-entri.php">Tambah Data</a>
        </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Nama Pekerjaan</th>
                        <th scope="col" style="width: 10%">Nama Perusahaan</th>
                        <th scope="col" style="width: 10%">Deskripsi</th>
                        <th scope="col" style="width: 10%">Syarat</th>
                        <th scope="col" style="width: 20%">Gaji</th>
                        <th scope="col" style="width: 30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>UI/UX Designer</td>
                        <td>PT. Astra Daihatsu Motor</td>
                        <td>Create a design for the company's branding</td>
                        <td>Final year student D3 - S1 (Major: DKV, Information Technology, or related majors)</td>
                        <td>Rp9.000.000</td>
                        <td>
                            <button type="button" class="btn btn-edit">
                  <a href="#">Edit</a>
                </button>
                            <button type="button" class="btn btn-delete" onclick="Hapus()">
                  Hapus
                </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        function Hapus() {
        if (confirm("Apakah Anda yakin menghapus data ini?")) {
          alert("Data berhasil dihapus.");
          // Kode untuk menghapus data
        } else {
          alert("Penghapusan data dibatalkan.");
        }
      }
    </script>
</body>

</html>