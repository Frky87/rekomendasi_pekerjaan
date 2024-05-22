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
            <h3>Input Data Job</h3>
            <div class="form-login">
                <form action="job.php">
                    <label for="job">Nama Pekerjaan</label>
                    <input class="input" type="text" name="name" id="name" placeholder="Input Nama Pekerjaan" />
                    <label for="job">Deskripsi</label>
                    <input class="input" type="text" name="desc" id="desc" placeholder="Input Deskripsi Pekerjaan" />
                    <label for="job">Syarat Pekerjaan</label>
                    <input class="input" type="text" name="syarat" id="syarat" placeholder="Input Syarat Pekerjaan" />
                    <label for="job">Gaji Pekerjaan</label>
                    <input class="input" type="text" name="gaji" id="gaji" placeholder="Input Gaji Pekerjaan" />
                    <button type="submit" class="btn btn-simpan" name="simpan" onclick="SimpanData()"> 
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script>
        function SimpanData() {
            alert("Data Berhasil Disimpan");
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }

    </script>
</body>

</html>