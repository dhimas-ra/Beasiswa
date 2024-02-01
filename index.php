<?php
//memulai sesi
session_start();
include 'koneksi.php';

if( isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");

  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $array["status"] = true;
    $array["message"] = "Login berhasil";
    $array["data"] = mysqli_fetch_assoc($query);
    header("location: index.php");
    
  } else {
    $array["status"] = false;
    $array["message"] = "Login gagal";
    $array["data"] = null;
  }
  echo json_encode($array);
}
$username=$_SESSION['username'];
$query = "SELECT * FROM user WHERE username='username'";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyBiz - v4.7.0
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="beranda.php">Ceritanya<span>Logo</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <?php if (isset($_SESSION['username'])) { ?>
            <!-- Tampilkan konten profil jika sudah login -->
            <li><a class="nav-link scrollto" href="beasiswa.php">Beasiswa</a></li>
            <li class="dropdown">
                        <?php 
                            $user = mysqli_query($koneksi, "select * from user where username='$username'");
                            while($data = mysqli_fetch_assoc($user)) {
                        ?>
                        <a class="nav-link scrollto" href="#">

                            <span><?php echo $data['nama_lengkap'];?></span>

                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <?php
                            }
                        ?>
                        <ul>
                            <li>
                                <a href="#">Profile</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
            </li>
        <?php } else { ?>
            <!-- Tampilkan konten login jika belum login -->
            <a href="login.php">Login</a>
        <?php } ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Log Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin Mau Keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a href="logout.php" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
             </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              
            </div>
          </div>

          <!-- Slide 3 -->
          <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              
            </div>
          </div>

        </div> -->

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- NEWS -->
    
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6"><br>
            <div class="ribbon left yellow">
              <h1>Welcome</h1>
            </div>          
            <div class="welcome white clearfix">            
              <div class="col-md-8">
                <p>
                </p>
                <blockquote class="wp-block-quote">
                  <p> <br><em>Welcome</em> </p>
                </blockquote>
                <p></p>
                <div class="wp-container-3 wp-block-columns has-2-columns">
                  <div class="wp-container-1 wp-block-column">
                    <figure class="wp-block-video"></figure>
                  </div>
                  <div class="wp-container-2 wp-block-column">
                    <p></p>
                  </div>
                </div>
                <p></p>
                </div>
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
          
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="news" class="news">
      <div class="row">
        <div class="col-md-5">
          <div class="item">
            <h3>Pengumuman</h3>
            <ul class="media-list">
              <li><a href="http://uin-suka.ac.id/media/pengumuman/beasiswa%20miskin.pdf"
                  title="Jadwal Penyerahan Beasiswa Miskin Mahasiswa UIN Sunan Kalijaga 2013">Jadwal Penyerahan Beasiswa Miskin
                  Mahasiswa UIN Sunan Kalijaga 2013</a>
                <div class="underline-menu2"></div>
              </li>
              <li><a href="http://uin-suka.ac.id/media/pengumuman/pengumuman%202013.pdf"
                  title="Pengumuman Penerima Beasiswa Gudang Garam 2013">Pengumuman Penerima Beasiswa Gudang Garam 2013</a>
                <div class="underline-menu2"></div>
              </li>
              <li><a href="http://uin-suka.ac.id/media/pengumuman/lomba.pdf"
                  title="Pemenang Lomba Karya Tulis Ilmiah Mahasiswa UIN Sunan Kalijaga Thn 2013">Pemenang Lomba Karya Tulis
                  Ilmiah Mahasiswa UIN Sunan Kalijaga...</a>
                <div class="underline-menu2"></div>
              </li>
              <li><a href="http://uin-suka.ac.id/media/pengumuman/nominator%20lktimn%202013.pdf"
                  title="Nominator Karya Tulis Ilmiah Mahasiswa Nasional (LKTIMN) 2013 UIN Sunan Kalijaga">Nominator Karya Tulis
                  Ilmiah Mahasiswa Nasional (LKTIMN) 2013 ...</a>
                <div class="underline-menu2"></div>
              </li>
              <li><a href="http://uin-suka.ac.id/media/pengumuman/revisi%20pengumuman%20wisuda.pdf"
                  title="Revisi Pengumuman No 3372 Tentang Pelaksanaan Wisuda Periode 1 Th Akademik 2013/2014">Revisi Pengumuman
                  No 3372 Tentang Pelaksanaan Wisuda Periode 1...</a>
                <div class="underline-menu2"></div>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-5">
          
          <div class="widget-item">
            <h3>News</h3>
            <ul class="media-list">
              <li class="media">
                <div class="media-left">
                  <a href="https://bola.tempo.co/read/1599241/4-berita-terkini-bursa-transfer-barcelona-juventus-real-madrid-chelsea">
                    <img width="300" height="200"
                      src="https://statik.tempo.co/data/2022/02/19/id_1089301/1089301_720.jpg"
                      class="attachment-small size-small wp-post-image" alt="" loading="lazy"
                      srcset="https://statik.tempo.co/data/2022/02/19/id_1089301/1089301_720.jpg 300w, https://alumni.umy.ac.id/wp-content/uploads/2021/07/6D8784C6-3192-435D-A17C-8D72A5D26590-scaled-1-768x513.jpeg 768w, https://statik.tempo.co/data/2022/02/19/id_1089301/1089301_720.jpg 272w"
                      sizes="(max-width: 300px) 100vw, 300px"> </a>
                </div>
                <div class="media-body">
                  <h4><a href="https://bola.tempo.co/read/1599241/4-berita-terkini-bursa-transfer-barcelona-juventus-real-madrid-chelsea">4 Berita Terkini 
                    Bursa Transfer: Barcelona, Juventus, Real Madrid, Chelsea</a></h4>
                  <span class="date">7 July, 2022</span>
      
                </div>
              </li>
            </ul>
            <a href="#" class="btn btn-secondary btn-sm">Berita Lainnya</a>
          </div>
        </div>
      
        <div class="col-md-5">
          <div class="widget-item">
            <h3>Events</h3>
            <section class="widget-home news-home">
      
              <ul class="media-list">
      
              </ul>
            </section><br>
            <a href="#" class="btn btn-secondary btn-sm">View more events</a>
          </div>
        </div>
      
        <div class="col-md-5">
          <div class="widget-item">
            <h3>Gallery</h3>
            <section class="gallery no-gutter">
              <div class="widget-item">
              
                <a href="https://www.skysports.com/football/news/11679/11188313/man-city-captain-vincent-kompany-graduates-with-masters-degree"
                  title="Alumni Awards #2018"><span class="gallery_icon ">
                    <i aria="hidden" class="fa fa-picture-o fa-1x"></i>
                  </span><img width="150" height="150" src="https://pbs.twimg.com/media/DSNjX2HWAAQbgna.jpg"
                    class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy"></a>
                <a href="https://bola.okezone.com/read/2021/11/10/45/2499377/luar-biasa-marcus-rashford-terima-penghargaan-mbe-dari-pangeran-william"
                  title="Alumni Awards #2018"><span class="gallery_icon ">
                    <i aria="hidden" class="fa fa-picture-o fa-1x"></i>
                  </span><img width="150" height="150" src="https://img.okezone.com/content/2021/11/10/45/2499377/luar-biasa-marcus-rashford-terima-penghargaan-mbe-dari-pangeran-william-kDlPPoCuJb.jpg"
                    class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy"></a>
              </div>
            </section>
            <a href="#" class="btn btn-secondary btn-sm">View more gallery</a>
          </div>
        </div>
      </div>
      
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="footer-info">
              <h4>Address</h4>
              <p>
                Tamantirto <br>
                Kasihan, Bantul<br><br>
                
              </p>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> +62 6887 123<br>
                <strong>Fax:</strong> +62 6887 123<br>
                <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-5 footer-links">
            <h4>Social Media</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

         

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MyBiz</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>