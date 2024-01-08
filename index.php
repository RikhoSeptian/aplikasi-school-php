<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>SMA KARYA PEMBANGUNAN MARGAHAYU</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="assets/img/LOGO1.png" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/atlantis.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">

  <!-- All CSS -->
  <link rel="icon" type="image/png" href="assets/img/samara.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- style start -->
  <style>
    .banner-image {
      background-image: url('assets/img/bg-sekolah.jpg');
      background-size: cover;
      height: 100vh;
      width: 100%;
    }

    .sma {
      border-radius: 20px;
    }
    .sma h1 {
      text-align: center;
      font-size: 3em;
      color: #FFEB3B;
      font-weight: 500;
      font-family: 'Courier New', Courier, monospace;
      text-shadow: black -4px -1px, wheat 4px -1px;
    }
    @media (max-width:570px) {
      .sma {
      border-radius: 20px;
    }
    .sma h1 {
      text-align: center;
      font-size: 30px;
      color: #FFEB3B;
      font-weight: 500;
      font-family: 'Courier New', Courier, monospace;
      text-shadow: black -4px -1px, wheat 4px -1px;
    }
    }
  </style>
  <!-- style end -->
</head>

<body>
  <div class="wrapper overlay-sidebar">
    <div class="main-header bg-primary">
      <!-- Logo Header -->
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a href="index.php" class="navbar-brand">
            <img src="assets/img/smakp.png" alt="navbar-brand" class="navbar-brand" width="40">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse align-it align-items-sm-start" id="navbarText">
            <a href="index.php" class="navbar-brand">
              <b class="text-white">SMA Karya Pembangunan</b>
            </a>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ml-2 active">
                <a class="nav-link" href="#home"><i class="fa fa-home"></i> Home</a>
              </li>
              <li class="nav-item ml-2">
                <a class="nav-link" href="#profile"><i class="fa fa-school"></i> Profile</a>
              </li>
              <li class="nav-item ml-2">
                <a class="nav-link" href="#alumni"><i class="fa fa-users"></i> Alumni</a>
              </li>
              <li class="nav-item ml-2">
                <a class="nav-link" href="#tentangkami"><i class="fa fa-user"></i> Daftar</a>
              </li>
              <li class="nav-item ml-2">
                <a class="nav-link" href="user.php"><i class="fa fa-list"></i> Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- End Logo Header -->
    </div>

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">

          <!-- halaman beranda starts -->
          <?php
          include 'landing_page/model/home.php';
          ?>
          <!-- halaman beranda end -->

          <!-- daftar mobil Starts -->
          <?php
          include 'landing_page/model/profile.php';
          ?>
          <!-- daftar mobil Ends -->

          <!-- artikel wisata starts -->
          <?php
          include 'landing_page/model/alumni.php';
          ?>
          <!-- artikel wisata ends -->

          <!-- tentang kami strats -->
          <?php
          include 'landing_page/model/tentang_kami.php';
          ?>
          <!-- tentang kami end -->
        </div>
      </div>

      <!-- footer start -->
      <footer class="footer bg-primary-gradient">
        <div class="container">
          <div class="copyright m-auto">
            &copy; <?= date('Y'); ?> SMA KARYA PEMBANGUNAN MARGAHAYU (<a href="https://stmik-mi.ac.id/"> <code>STMIK MARDIRA INDONESIA</code></a>
            | <?= date('Y'); ?> )
          </div>
        </div>
      </footer>
      <!-- footer end -->
    </div>
  </div>


  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Sweet Alert -->
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Atlantis JS -->
  <script src="assets/js/atlantis.min.js"></script>

  <!-- All Js -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>