<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobsJive</title>
    <link rel="shortcut icon" type="x-icon" href="./assets/logos.jpg" id="icons">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar">
        <div class="content">
            <div class="logo" style="display: flex; align-items: center;">
                <img src="./assets/jobjiv.png" alt="logo" width="100">
                <a href="index.php">JobsJive</a>
            </div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li><a href="#">Home</a></li>
                <li><a href="#">Job search</a></li>
                <li><a href="#">Career advice</a></li>
                <li><a class="lgn" href="login.php">Login</a></li>
                <li><a class="rgs" href="register.php">Register</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <div class="banner"></div>
    <div class="container">
        <p>Temukan Pekerjaan Impianmu</p>
        <p>Dengan<span class="judul"> JobsJive</span></p>
        <p>Temukan pekerjaan yang sesuai dengan minat dan bakatmu</p>
        <form>
            <input type="text" placeholder="Posisi atau Perusahaan" style="padding-left:30px;">
            <input type="button" value="Cari">
        </form>
    </div>
    <div class="container-slider">
        <div class="img-slider">
            <div class="slide active">
                <img src="assets/slide/1.png" alt="slider 1">
            </div>
            <div class="slide">
                <img src="assets/slide/2.png" alt="slider 2">
            </div>
            <div class="slide">
                <img src="assets/slide/3.png" alt="slider 3">
            </div>
            <div class="slide">
                <img src="assets/slide/4.png" alt="slider 4">
            </div>
            <div class="slide">
                <img src="assets/slide/5.png" alt="slider 5">
            </div>
            <div class="navigation">
                <div class="btn active"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="content">
            <div class="title">Rekomendasi Pekerjaan</div>
            <p>Mencari pekerjaan adalah tahap krusial dalam perjalanan karier seseorang. Langkah pertama yang penting adalah memahami dengan jelas tujuan dan minat karier yang dimiliki. 
                Ini membantu dalam menentukan arah pencarian dan memilih pekerjaan yang sesuai. Kemudian, penting untuk memperbarui dan memperbaiki resume sesuai dengan pengalaman, 
                pendidikan, dan keterampilan terbaru. Resume yang kuat akan meningkatkan kesempatan Anda untuk diperhatikan oleh perekrut.</p>
            <p>Selanjutnya, manfaatkan jaringan profesional Anda. Berbicaralah dengan teman, keluarga, dan rekan kerja terdahulu. Banyak peluang pekerjaan didapat melalui referensi dan koneksi pribadi. 
                Jangan ragu untuk berpartisipasi dalam acara atau komunitas industri yang relevan. Memperluas jaringan Anda akan membuka peluang baru dan meningkatkan visibilitas Anda di pasar kerja.</p>
            <p>Konsistensi dan ketekunan sangat penting dalam pencarian pekerjaan. Buat jadwal harian atau mingguan untuk melamar pekerjaan, mengikuti pelatihan, dan meningkatkan keterampilan Anda. 
                Teruslah mencari peluang baru dan tetaplah positif meskipun menghadapi tantangan. Persiapkan diri dengan baik untuk wawancara dengan melakukan riset tentang perusahaan dan praktik menjawab pertanyaan wawancara dengan percaya diri.</p>
            <p>Ingatlah bahwa pencarian pekerjaan adalah proses yang memerlukan waktu dan upaya. Tetaplah fokus pada tujuan Anda, jaga semangat Anda tetap tinggi, dan jangan ragu untuk memanfaatkan sumber daya dan dukungan yang tersedia. 
                Dengan kesabaran, tekad, dan sikap yang proaktif, Anda akan meningkatkan peluang Anda untuk mendapatkan pekerjaan yang diinginkan.</p>
            <p>Selain itu, perlu juga untuk terus mengembangkan dan meningkatkan keterampilan Anda sesuai dengan kebutuhan pasar kerja. Manfaatkan waktu luang Anda untuk mengikuti kursus online, seminar, atau pelatihan yang relevan dengan bidang pekerjaan yang Anda incar. 
                Peningkatan keterampilan akan tidak hanya membuat Anda lebih kompetitif di pasar kerja, tetapi juga menunjukkan komitmen Anda terhadap pertumbuhan profesional yang berkelanjutan. 
                Dengan memperkuat kualifikasi dan keterampilan Anda, Anda akan menjadi kandidat yang lebih menarik bagi para perekrut</p>
        </div>
    </div>

    <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            navbar.classList.add("show");
            menuBtn.classList.add("hide");
            body.classList.add("disabled");
        }
        cancelBtn.onclick = () => {
            body.classList.remove("disabled");
            navbar.classList.remove("show");
            menuBtn.classList.remove("hide");
        }
        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }

        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 1;

        // Javascript for image slider manual navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // Javascript for image slider autoplay navigation
        var repeat = function(activeClass) {
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function() {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });

                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;

                    if (slides.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
            
        }
        repeat();
        const footerText = document.querySelector(".footer p");
        const changeFooterTextBtn = document.createElement("button");
        changeFooterTextBtn.textContent = "Change Footer Text";
        body.appendChild(changeFooterTextBtn);
        changeFooterTextBtn.onclick = () => {
            footerText.textContent = "Copyright &copy; 2024 New Text";
        }
    </script>
    <footer class="footer">
        <div class="row">
            <p> Ayo Mulai Cari Pekerjaan Impianmu </p>
        </div>
    </footer>
</body>

</html>