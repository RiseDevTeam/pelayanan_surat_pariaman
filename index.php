<?php
include 'koneksi.php';
session_start();

if(isset($_SESSION['nomor_ktp'])){
$userr = mysqli_query($conn,"SELECT * FROM detail_user WHERE nomor_ktp = '$_SESSION[nomor_ktp]'");
$user = mysqli_fetch_assoc($userr);
} else {

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pelayanan Perizinan dan Surat Rekomendasi di Kantor Camat Pariaman Tengah</title>
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Surat Izin</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <?php 
                        if(isset($_SESSION['nomor_ktp'])){
                          echo"
                          <li><a href='izin_bangunan.php'>Surat Izin Bangunan</a></li>
                          <li><a href='izin_usaha.php'>Surat Izin Usaha</a></li>
                          ";
                        } else {
                          echo"
                          <li><a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Izin Bangunan</a></li>
                          <li><a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Izin Usaha</a></li>
                          ";
                        }
                      ?>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Rekomendasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <?php 
                        if(isset($_SESSION['nomor_ktp'])){
                          echo"
                          <li><a href='ket_blm_menikah.php'>Surat Keterangan Belum Menikah</a></li>
                          <li><a href='ket_klkn_baik.php'>Surat Keterangan Berkelakuan Baik</a></li>
                          <li><a href='ket_mnggl_dunia.php'>Surat Keterangan Meninggal Dunia</a></li>
                          ";
                        } else {
                          echo"
                          <li><a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Keterangan Belum Menikah</a></li>
                          <li><a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Keterangan Berkelakuan Baik</a></li>
                          <li><a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Keterangan Meninggal Dunia</a></li>
                          ";
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION['nomor_ktp'])){
                        echo"
                        <li><a class='nav-link scrollto' href='surat_pengajuan.php'>Surat Pengajuan Saya</a></li>
                        <li class='dropdown'><a href=#><span><b>".$user['nama_lengkap']."</b></span><i class='bi bi-chevron-down'></i></a>
                            <ul>
                                <li><a href='logout.php'>Logout</a></li>
                            </ul>
                        </li>";
                    } else {
                        echo"
                        <li><a class='nav-link scrollto' href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Pengajuan Saya</a></li>
                        <li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
                    }
                ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        </div>
    </header>

    <!-- MODAL CONTENT -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Harus Login!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          Anda harus login sebelum melakukan pengajuan surat!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            <a href="login.php"><button type="button" class="btn btn-warning">Login</button></a>
          </div>
        </div>
      </div>
    </div>

    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>PELAYANAN PERIZINAN DAN SURAT REKOMENDASI</h1>
                <h2>KANTOR KECAMATAN PARIAMAN TENGAH</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/hero-img.png" alt="">
                </div>
            </div>
        </div>

    </section>

    <main>

    <!-- SESI SURAT IZIN -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Langkah Pengajuan Surat Izin</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
              <img src="assets/img/step1.jpg" draggable="false" style="width:100%; height:auto;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
              <img src="assets/img/step2.jpg" draggable="false" style="width:100%; height:auto;">
          </div>
        </div>

      </div>
    </section>

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Surat Izin</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-buildings"></i></div>
              <h4>
                <?php
                  if(isset($_SESSION['nomor_ktp'])){
                    echo"
                    <a href='izin_bangunan.php'>Surat Izin Mendirikan Bangunan (IUMB)</a>
                    ";
                  } else {
                    echo"
                    <a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Izin Mendirikan Bangunan (IUMB)</a>
                    ";
                  }
                ?>
              </h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-money-withdraw'></i></div>
              <h4>
                <?php
                  if(isset($_SESSION['nomor_ktp'])){
                    echo"
                    <a href='izin_usaha.php'>Surat Izin Usaha Micro dan Kecil (IUMK)</a>
                    ";
                  } else {
                    echo"
                    <a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Izin Usaha Micro dan Kecil (IUMK)</a>
                    ";
                  }
                ?>  
              </h4>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Syarat - Syarat Pengajuan Surat Izin</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class='bx bx-info-circle icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1" class="collapsed">Surat Izin Mendirikan Bangunan (IUMB)<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                <?php
                $sbangunan = mysqli_query($conn,"SELECT * FROM surat_izin WHERE kategori_surat = 'Surat Izin Bangunan'");
                if(mysqli_num_rows($sbangunan)>0){
                  $bangunan = mysqli_fetch_assoc($sbangunan);
                  echo $bangunan['syarat_surat'];
                } else { echo "<p><i>Syarat Belum Diinputkan!</i></p>"; }
                 ?>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class='bx bx-info-circle icon-help'></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Surat Izin Usaha Micro dan Kecil (IUMK)<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <?php
                $susaha = mysqli_query($conn,"SELECT * FROM surat_izin WHERE kategori_surat = 'Surat Izin Usaha'");
                if(mysqli_num_rows($susaha)>0){
                  $usaha = mysqli_fetch_assoc($susaha);
                  echo $usaha['syarat_surat'];
                } else { echo "<p><i>Syarat Belum Diinputkan!</i></p>"; } ?>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section>

    <section class="section-bg">

    </section>

    <!-- SESI SURAT REKOMENDASI -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Langkah Pengajuan Surat Rekomendasi</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
              <img src="assets/img/stepp1.jpg" draggable="false" style="width:100%; height:auto;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
              <img src="assets/img/stepp2.jpg" draggable="false" style="width:100%; height:auto;">
          </div>
        </div>

      </div>
    </section>

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Surat Rekomendasi</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-male-female"></i></div>
              <h4>
                <?php
                  if(isset($_SESSION['nomor_ktp'])){
                    echo"
                    <a href='#'>Surat Rekomendasi Keterangan Belum Menikah</a>
                    ";
                  } else {
                    echo"
                    <a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Rekomendasi Keterangan Belum Menikah</a>
                    ";
                  }
                ?>
              </h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-book-heart'></i></div>
              <h4>
                <?php
                  if(isset($_SESSION['nomor_ktp'])){
                    echo"
                    <a href='#'>Surat Rekomendasi Keterangan Berkelakuan Baik</a>
                    ";
                  } else {
                    echo"
                    <a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Rekomendasi Keterangan Berkelakuan Baik</a>
                    ";
                  }
                ?>
              </h4>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-user-x'></i></div>
              <h4>
                <?php
                  if(isset($_SESSION['nomor_ktp'])){
                    echo"
                    <a href='#'>Surat Rekomendasi Keterangan Meninggal Dunia</a>
                    ";
                  } else {
                    echo"
                    <a href=javascript:void(0); data-bs-toggle='modal' data-bs-target='#exampleModal'>Surat Rekomendasi Keterangan Meninggal Dunia</a>
                    ";
                  }
                ?>
              </h4>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Syarat - Syarat Pengajuan Surat Rekomendasi</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class='bx bx-info-circle icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-3" class="collapsed">Surat Rekomendasi Keterangan Belum Menikah<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <?php
                $smenikah = mysqli_query($conn,"SELECT * FROM surat_rekomendasi WHERE kategori_surat = 'Surat Keterangan Belum Menikah'");
                if(mysqli_num_rows($smenikah)>0){
                  $menikah = mysqli_fetch_assoc($smenikah);
                  echo $menikah['syarat_surat'];
                } else { echo "<p><i>Syarat Belum Diinputkan!</i></p>";} ?>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class='bx bx-info-circle icon-help'></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Surat Rekomendasi Keterangan Berkelakuan Baik<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <?php
                $sbaik = mysqli_query($conn,"SELECT * FROM surat_rekomendasi WHERE kategori_surat = 'Surat Keterangan Berkelakuan Baik'");
                if(mysqli_num_rows($sbaik)>0){
                  $baik = mysqli_fetch_assoc($sbaik);
                  echo $baik['syarat_surat'];
                } else { echo "<p><i>Syarat Belum Diinputkan!</i></p>";} ?>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-info-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Surat Keterangan Meninggal Dunia<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <?php
                $smeninggal = mysqli_query($conn,"SELECT * FROM surat_rekomendasi WHERE kategori_surat = 'Surat Keterangan Meninggal Dunia'");
                if(mysqli_num_rows($smeninggal)>0){
                  $meninggal = mysqli_fetch_assoc($smeninggal);
                  echo $meninggal['syarat_surat'];
                } else { echo "<p><i>Syarat Belum Diinputkan!</i></p>";} ?>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section>

    </main>

    <footer id="footer">

        <section class="section-bg">

        </section>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PELAYANAN SURAT</h3>
            <p>
              Kecamatan Pariaman Tengah<br>
              Pemerintahan Kota Pariaman<br>
              Sumatera Barat, Indonesia<br><br>
              <strong>No. HP:</strong> +62 6969 420<br>
              <strong>Email:</strong> yahoo@gmail.com<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Aplikasi Pelayanan Surat</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>


    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>