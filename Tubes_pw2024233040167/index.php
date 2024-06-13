<?php  
    session_start();
    require "inc/koneksi.php";

    $queryArtikel = mysqli_query($conn, "SELECT id, judul, gambar, sinopsis FROM artikel LIMIT 4")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/artikel.css">
    <title>SportNews</title>
</head>

<body>
    <!-- Navbar start -->
    <div class="navbar">
        <a href="#" class="navbar-logo">
            Sport<span>News</span>.
        </a>

        <div class="navbar-nav">
            <a href="#beranda">Beranda</a>
            <a href="#layanan">About Us</a>
            <a href="#artikel">Artikel</a>
            <?php   
                if (isset($_SESSION['username'])) {
                    // Jika pengguna sudah login, tampilkan tombol Logout
                    echo '<a href="logout.php" id="login">Logout</a>';
                } else {
                    // Jika pengguna belum login, tampilkan tombol Masuk
                    echo '<a href="login.php" id="login">Login</a>';
                }
            ?>


        </div>


        <div class="hamburger">
            <a href="#" id="hamburger" style="margin-left: 1rem;" class="fa-solid fa-bars fa-xl"></a>
        </div>


    </div>
    <!-- Navbar end -->

    <!-- Hero Section Start -->
    <section class="hero" id="beranda">
        <main class="content">
            <h1>Sport<span>News</span></h1>
            <?php if (isset($_SESSION['username'])) { ?>
                <p>Halo <?php echo $_SESSION['username']; ?>, Ayo baca artikel dan update tentang olahraga.</p>
            <?php } else { ?>
            <p>Ayo baca artikel dan update tentang olahraga.</p>
            <?php } ?>
            <a href="register.php" class="cta">Registrasi</a>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- Abaout Section Start -->
    <section id="layanan" class="layanan">
        <h2><span>About</span> Us</h2>
    </section>

    <div class="tentang">
        <div class="tentang-kami">
            <p>Selamat datang di Website SportNews!</p>
            <p> Di SportNews, kami berkomitmen untuk memberikan berita olahraga terkini, analisis mendalam, dan konten eksklusif kepada penggemar olahraga di seluruh dunia. Apapun minat olahraga Anda, kami siap menyajikan informasi terbaru dan terlengkap dari berbagai cabang olahraga.</p>
            <p>Kami percaya bahwa olahraga memiliki kekuatan untuk menyatukan orang-orang. Di SportNews, kami berusaha untuk menjadi platform yang menyatukan penggemar olahraga dari berbagai latar belakang untuk menikmati dan merayakan olahraga bersama.</p>
            <p>Terima kasih telah mengunjungi Website SportNews. Semoga artikel-artikel yang kami
                sajikan dapat
                memberikan
                Informasi terupdate di dunia sport!
            </p>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Artikel Section Start -->
    <section id="artikel" class="artikel">
        <h2>Artikel</h2>
    </section>

    <div class="lainnya">
        <?php while($data = mysqli_fetch_array($queryArtikel)){ ?>
        <div class="lainnya-page">
            <div class="lainnya-img">
                <img src="css/image/<?php echo $data['gambar']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $data['judul']; ?></h3>
                <p><?php echo $data['sinopsis']; ?></p>
                <a href="artikel-detail.php?judul=<?php echo $data['judul']; ?>">Baca Selengkapnya...</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="selebihnya">
        <a href="artikel.php">Artikel lainnya</a>
    </div>
    <!-- Artikel Section End -->



    <!-- footer Section start -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a href="#" class="navbar-logo">
                    Sport<span>News</span>.
                </a>
            </div>
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#" class="link-footer">Beranda</a>
                <a href="#" class="link-footer">Layanan Kami</a>
                <a href="#" class="link-footer">Artikel</a>
                <a href="#" class="link-footer">Kontak</a>
            </div>
            <div class="box">
                <h3>Site Map</h3>
                <a href="#" class="link-footer">FAQ</a>
                <a href="#" class="link-footer">Blog</a>
                <a href="#" class="link-footer">Syarat & Ketentuan</a>
                <a href="#" class="link-footer">Kebijakan Privasi</a>
                <a href="#" class="link-footer">Karir</a>
                <a href="#" class="link-footer">Securty</a>
            </div>
            <div class="box">
                <h3>Social Media</h3>
                <a href="#" class="link-footer">Instagram</a>
                <a href="#" class="link-footer">Facebook</a>                
                <a href="#" class="link-footer">Twitter</a>
            </div>
        </div>
        <div class="create">
            <a href="#" class="wm">
                Copyright@2024 | Created by DennisSetyaPradana
            </a>
        </div>
    </section>
    <!-- Footer Section End -->

    <script src="js/script.js"></script>
</body>

</html>