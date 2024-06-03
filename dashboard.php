<?php
session_start();
if ($_SESSION['username'] == null) {
    header('location:login.php');
    exit();
}

include 'koneksi.php';

// Query to get the number of employees
$employeeCountQuery = "SELECT COUNT(*) as total_employees FROM employee";
$employeeCountResult = $koneksi->query($employeeCountQuery);
$employeeCountRow = $employeeCountResult->fetch_assoc();
$totalEmployees = $employeeCountRow['total_employees'];

// Query to get the number of jobs
$jobCountQuery = "SELECT COUNT(*) as total_jobs FROM jobs";
$jobCountResult = $koneksi->query($jobCountQuery);
$jobCountRow = $jobCountResult->fetch_assoc();
$totalJobs = $jobCountRow['total_jobs'];
?>

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
    <style>
        .widget-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .widget {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            max-width: 220px;
            position: relative;
        }

        .widget i {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .widget .widget-details {
            margin-top: 10px;
        }

        .widget .widget-title {
            font-size: 16px;
            font-weight: bold;
        }

        .widget .widget-count {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .widget a {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            color: #fff;
            text-decoration: none;
            background: #007bff;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .widget a:hover {
            background: #0056b3;
        }

        .widget-blue {
            background: #007bff;
            color: white;
        }

        .widget-green {
            background: #28a745;
            color: white;
        }

        .widget-orange {
            background: #fd7e14;
            color: white;
        }

        .widget-red {
            background: #dc3545;
            color: white;
        }
    </style>
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
                    <span class="links_name">Employee</span>
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
            <h2 id="text">
                <?php echo $_SESSION['username']; ?>
            </h2>
            <h3 id="date"></h3>

            <!-- Widget Section -->
            <div class="widget-container">
                <div class="widget widget-orange">
                    <i class="fa-solid fa-users"></i>
                    <div class="widget-details">
                        <span class="widget-title">Total Employees</span>
                        <span class="widget-count"><?php echo $totalEmployees; ?></span>
                        <a href="./Employees/employee.php">View Details</a>
                    </div>
                </div>
                <div class="widget widget-green">
                    <i class="fa-solid fa-suitcase"></i>
                    <div class="widget-details">
                        <span class="widget-title">Total Jobs</span>
                        <span class="widget-count"><?php echo $totalJobs; ?></span>
                        <a href="./Jobs/job.php">View Details</a>
                    </div>
                </div>
            </div>
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

        function myFunction() {
            const months = ["Januari", "Februari", "Maret", "April", "Mei",
                "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
                "Jumat", "Sabtu"
            ];
            let date = new Date();
            let jam = date.getHours();
            let tanggal = date.getDate();
            let hari = days[date.getDay()];
            let bulan = months[date.getMonth()];
            let tahun = date.getFullYear();
            let m = date.getMinutes();
            let s = date.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
            requestAnimationFrame(myFunction);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        window.onload = function() {
            let date = new Date();
            let jam = date.getHours();
            if (jam >= 4 && jam <= 10) {
                document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Pagi,");
            } else if (jam >= 11 && jam <= 14) {
                document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Siang,");
            } else if (jam >= 15 && jam <= 18) {
                document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Sore,");
            } else {
                document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Malam,");
            }
            myFunction();
        };
    </script>
</body>

</html>