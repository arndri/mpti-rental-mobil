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

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style-mobil.css" rel="stylesheet">
  <link href="css/mobil.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style2.css">

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
          <li ><a href="index.php">Home</a></li>
          <li ><a href="mobil.php">Armada Kami</a></li>
          <li><a href="bandara-yia.php">Antar Jemput Bandara YIA</a></li>
          <li class="menu-active"><a href="#portfolio">Wisata Jogja</a></li>
          <li><a href="kontak.html">Kontak Kami</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  

  <main id="main">

        <section id="featured-services">
                <div class="container">
                  <div class="row">
          
                    <div class="col-lg-4 box">
                      
                      <h4 class="title"><a href=""></a></h4>
                      <p class="description"></p>
                    </div>
          
                   
                  </div>
                </div>
        </section><!-- #featured-services -->
    
    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Paket Wisata Jogja</h3>
        </header>
        <br>
        <div class="brand">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <div class="center">
                                <div class="pagination">
                                
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                            <div class="brand_box">
                                <img src="img/wisata/1.png" alt="img" />
                                <h3>Mulai<strong class="red"> Rp 180.000/pax</strong></h3>
                                <hr>
                                <button class="button" onclick="submitFilter('1')">Detail Pesan</button>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                            <div class="brand_box">
                                <img src="img/wisata/2.png" alt="img" />
                                <h3>Mulai<strong class="red"> Rp 250.000/pax</strong></h3>
                                <hr>
                                <button class="button" onclick="submitFilter('2')">Detail Pesan</button>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                            <div class="brand_box">
                                <img src="img/wisata/3.png" alt="img" />
                                <h3>Mulai<strong class="red"> Rp 260.000/pax</strong></h3>
                                <hr>
                                <button class="button" onclick="submitFilter('3')">Detail Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
      </div>
    </section><!-- #portfolio -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h4>Angga Karya Wisata</h4>
            <p>Rental Mobil Termurah dan Terpercaya.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Info</h4>
            <p>
              <strong>Alamat :</strong> Gg. Abimanyu No.1088, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55162, Indonesia<br>
              <strong>Phone :</strong> +6282311965448<br>
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

  <script>
    function submitFilter(filter) {
      window.location.href = 'daftar-wisata.php?filter=' + filter;
    }
  </script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
