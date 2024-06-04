<?php

session_start();


// if (!isset($_SESSION['username'])) {
//     header("Location: index.php");
//     exit();
// }

include 'config.php';
include 'process/queries.php';
$conn = connect_to_db();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Angga Transport</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/mobil.css" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-187618315-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-187618315-1');
</script>

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Angga Transport</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#portfolio">Home</a></li>
          <li><a href="mobil.php">Armada Kami</a></li>
          <li><a href="bandara-yia.php">Antar Jemput Bandara YIA</a></li>
          <li><a href="wisata-jogja.php">Wisata Jogja</a></li>
          <li><a href="kontak.html">Kontak Kami</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/intro-carousel/Home.png" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">
    <!--==========================
      About Us Section
    ============================-->
   

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Rental Mobil Jogja</h3>
          <p>
            Solusi Tepat untuk Kebutuhan Rental Mobil Anda di Jogja
Lepaskan rasa ragu dan nikmati pengalaman sewa mobil yang aman dan nyaman bersama Angga Transport!
          </p>
        </header>

        <details><summary>Lanjutkan</summary>
          <br><br>
        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-android-sad"></i></div>
            <h4 class="title"><a>Memahami Keraguan Anda</a></h4>
            <p class="description">Takut tersesat: Kami menyediakan layanan peta digital dan driver berpengalaman untuk membantu Anda mencapai tujuan dengan mudah.
                Takut mogok di jalan: Kami memiliki armada mobil terbaru dan terawat yang selalu dicek secara berkala untuk memastikan kelancaran perjalanan Anda.
                Takut kriminalitas: Kami sarankan untuk menghindari daerah sepi dan gelap pada malam hari, dan selalu waspada terhadap situasi di sekitar Anda.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-alert-circled"></i></div>
            <h4 class="title"><a>Menjawab Kekhawatiran Anda</a></h4>
            <p class="description">Google Maps: Navigasi mudah dan akurat dengan Google Maps untuk menghindari tersesat.
                Unit Terbaru: Armada mobil terbaru dan terawat untuk pengalaman berkendara yang nyaman dan bebas mogok.
                Kondisi Yogyakarta: Tips aman berwisata di Jogja untuk meminimalisir risiko kriminalitas.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-android-cancel"></i></div>
            <h4 class="title"><a>Lebih dari Sekedar Rental Mobil</a></h4>
            <p class="description">Driver Profesional: Tersedia driver profesional yang siap mengantar Anda ke berbagai tujuan.
                Harga Terjangkau: Tarif sewa mobil yang kompetitif dan bersahabat.
                Pelayanan Ramah: Kami selalu siap membantu dan memberikan pelayanan terbaik untuk Anda.</p>
          </div>

        </div>


        <!-- <header class="section-header wow fadeInUp">
          <p>
            Untuk hal tersebut kami Angga Transport menyediakan layanan yang terbaik untuk anda selama menyewa atau merental
            mobil di Jogja pada kami. Kami juga menyediakan layanan Driver sebagai pemandu untuk anda yang baru berwisata ke Yogyakarta 
            agar anda mendapat kenyamanan dalam berwisata. Atas keraguan itu kami memberikan jawabannya :
          </p>
        </header> -->

        <!-- <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-map"></i></div>
            <h4 class="title"><a>Google Maps</a></h4>
            <p class="description">Google Maps atau waze adalah layanan yang di berikan oleh Google untuk membantu anda dalam menentukan arah jalan agar anda terhindar dari kata tersesat di jalan.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-model-s"></i></div>
            <h4 class="title"><a>Unit Terbaru</a></h4>
            <p class="description">Kami juga menyediakan Unit terbaru dan ter Up To Date untuk kepuasan anda dalam berwisata di Yogyakarta.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ribbon-b"></i></div>
            <h4 class="title"><a>Kondisi Yogyakarta</a></h4>
            <p class="description">Untuk itu kami menyarankan anda ketika ingin berpergian di daerah Yogyakarta untuk menghindari daerah sepi dan gelap pada malam hari agar anda terhindar dari tindakan kriminal.
            </p>
          </div>

        </div> -->
      </details>


      </div>
    </section><!-- #services -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
        <div class="container">
  
          <header class="section-header">
            <h3 class="section-title">Armada Kami</h3>
            <p>Untuk Syarat dan Ketentuan Silahkan Lihat di Bawah</p>
          </header>
  
          <div class="row">
            <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Popular</li>
              <li data-filter=".filter-card">Mewah</li>
            </ul>
            </div>
          </div>
  
          <div class="row portfolio-container">
            <?php
              $sql = "SELECT * FROM armada";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Determine the filter class based on the 'jenis' column
                    $filterClass = '';
                    switch($row["jenis"]) {
                        case 'popular':
                            $filterClass = 'filter-app';
                            break;
                        case 'mewah':
                            $filterClass = 'filter-card';
                            break;
                        default:
                            $filterClass = '';
                    }
            
                    echo '<div class="col-lg-4 col-md-6 portfolio-item ' . $filterClass . ' wow fadeInUp">';
                    echo '<div class="portfolio-wrap">';
                    echo '<figure>';
                    echo '<img src="data:image/jpeg;base64,' . $row["gambar"] . '" class="img-fluid" alt="">';
                    echo '<a href="data:image/jpeg;base64,' . $row["gambar"] . '" data-lightbox="portfolio" data-title="' . $row["nama_kendaraan"] . '" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>';        
                    echo '</figure>';
                    echo '<div class="portfolio-info">';
                    echo '<h3><a href="#">' . $row["nama_kendaraan"] . '</a></h3>';
                    echo '<a>' . $row["jenis"] . '</a>';
                    echo '<br><br>';
                    echo '<h4>' . ($row["harga_12"] != 0 ? 'Mulai<strong class="red"> Rp ' . number_format($row["harga_12"], 0, ',', '.') . ' / Full Day</strong>' : '-') . '</h4><hr>';
                    echo '<h4>' . ($row["harga"] != 0 ? 'Mulai<strong class="red"> Rp ' . number_format($row["harga"], 0, ',', '.') . ' / 12 Jam</strong>' : '-') . '</h4><hr>';
                    echo '<h4>' . $row["fasilitas"] . '</h4><hr>';
                    echo '<h4>Max ' . $row["kapasitas"] . ' Orang</h4>';
                    echo '<a class="btn-get-started" type="button" href="http://api.whatsapp.com/send?phone=6282225988878&amp;text=Hallo Angga Transport, Saya ingin bertanya tentang Sewa Mobil ' . $row["nama_kendaraan"] . '" rel="noopener noreferrer" target="_blank">pesan</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No armada found";
            }
            ?>


            

          </div>
        </div>
      </section><!-- #portfolio -->

      <section id="services">
          <div class="col-md-12 footer-contact" class="container">
    
            <header class="section-header wow fadeInUp">
              <h3>Syarat dan ketentuan Berlaku</h3><br>
              <h5><li>Sewa mobil menggunakan Driver.</li></h5>
                <h5><li>Termasuk: Mobil ber-AC, sopir, BBM.</li></h5>
                <h5><li>Tidak termasuk: parkir, makan untuk driver, dll.</li></h5>
                <h5><li>Biaya overtime per-jam berlaku 20% dari tarif sewa.</li></h5>
                <h5><li>Harga tersebut diluar biaya tiket masuk obyek wisata.</li></h5>
                <h5><li>Harga untuk mobil selain yang di atas harap hubungi kami.</li></h5>
                <h5><li>Bila tujuan ke Gunung Kidul Wonosari akan di kenakan tambahan charge sebesar Rp.50.000,-</li></h5>
            </header>
    
          </div>
        </section><!-- #services -->
    
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h4>Angga Kaya Wisata</h4>
            <p>Rental Mobil Termurah dan Terpercaya.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Info</h4>
            <p>
              <strong>Alamat :</strong>Gg. Abimanyu No.1088, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55162, Indonesia <br>
              <strong>Phone :</strong>+6282311965448<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Fresh From Blog</h4>
            <p>
              <li><a href="index.php">Home</a></li>
              <li><a href="mobil.php">Armada Kami</a></li>
              <li><a href="bandara-yia.php">Antar Jemput Bandara YIA</a></li>
              <li><a href="wisata-jogja.php">Wisata Jogja</a></li>
              <li><a href="kontak.html">Kontak Kami</a></li>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Social Media</h4>
            <div class="social-links">
              <a href="http://api.whatsapp.com/send?phone=6282311965448&amp;text=Hallo Angga Transport, Saya ingin bertanya tentang Sewa Mobil Jogja" rel="noopener noreferrer" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
              <a href="https://www.instagram.com/anggatransportt/" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=6282311965448&text=Hallo Angga Transport, Saya ingin bertanya tentang Sewa Mobil Jogja" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=6282311965448&text=Hallo Angga Transport, Saya ingin bertanya tentang Sewa Mobil Jogja" class="floatt" target="_blank">
<i class="fa fa-phone my-floatt"></i>
</a>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="login-admin.php" class="floattt" target="_blank">
<i class="fa fa-user my-floattt"></i>
</a>

  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
