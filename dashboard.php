<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/image/vas.png" />
    <link rel="stylesheet" href="css/admin.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/387774990c.js" crossorigin="anonymous"></script>
    <title>JobsJive</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details" style="align-items: center;">
            <img src="./assets/jobjiv.png" alt="logo" width="60">
            <span class="logo_name">JobsJive</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <i class="fa-solid fa-border-all"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./Employees/employee.php">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Employe</span>
                </a>
            </li>
            <li>
                <a href="./Jobs/job.php">
                    <i class="fa-solid fa-suitcase"></i>
                    <span class="links_name">Jobs</span>
                </a>
            </li>
            <li>
                <a href="/index.php" onclick="return confirm('Apakah kamu yakin ingin keluar?');">
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
        <div class="home-content">
            <h2 id="text"></h2>
            <h3 id="date"></h3>
        </div>
    </section>
    <script>
       function Tanggal() {
            const months = ["Januari", "Februari", "Maret", "April", "Mei",
                "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ];
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
                "Jumat", "Sabtu"
            ];
            let date = new Date();
            jam = date.getHours();
            tanggal = date.getDate();
            hari = days[date.getDay()];
            bulan = months[date.getMonth()];
            tahun = date.getFullYear();
            let session = "AM";
            if (jam > 12) {
                session = "PM";
                jam = jam - 12;
            }
            let m = date.getMinutes();
            let s = date.getSeconds();

            m = checkTime(m);
            s = checkTime(s);
            document.getElementById("date").innerHTML = `${hari}, 
           ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}:${session}`;
            requestAnimationFrame(Tanggal);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        window.onload = function() {
            let nama = prompt("Masukkan Nama Anda : ", "Admin");
            let password = prompt("Masukkan Nama Anda : ", "2218049");
            let jam = new Date().getHours();
            if (nama && password != null) {
                if (jam >= 4 && jam <= 10) {
                    document.getElementById("text").innerHTML = "Selamat Pagi " + nama;
                } else if (jam >= 11 && jam <= 14) {
                    document.getElementById("text").innerHTML = "Selamat Siang " + nama;
                } else if (jam >= 15 && jam <= 18) {
                    document.getElementById("text").innerHTML = "Selamat Sore " + nama;
                } else {
                    document.getElementById("text").innerHTML = "Selamat Malam " + nama;
                }
            }
            Tanggal();
        };
    </script>
</body>

</html>