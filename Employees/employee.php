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
            <h3>Data Karyawan</h3>
            <button type="button" class="btn btn-tambah">
          <a href="employee-entri.php">Tambah Data</a>
        </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th scope="col" style="width: 10%">Jabatan</th>
                        <th scope="col" style="width: 5%">Jenis Kelamin</th>
                        <th scope="col" style="width: 10%">No Telepon</th>
                        <th scope="col" style="width: 20%">Alamat</th>
                        <th scope="col" style="width: 20%">TTL</th>
                        <th scope="col" style="width: 10%">Status Karyawan</th>
                        <th scope="col" style="width: 30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Yuliana</td>
                        <td>Karyawati</td>
                        <td>Perempuan</td>
                        <td>08456123789</td>
                        <td>Jl. Bunga</td>
                        <td>Malang, 7 September 1990</td>
                        <td>Kontrak</td>
                        <td>
                            <button type="button" class="btn btn-edit">
                  <a href="#">Edit</a>
                </button>
                            <button type="button" class="btn btn-delete">
                  <a href="#">Hapus</a>
                </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>