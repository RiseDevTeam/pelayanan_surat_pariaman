<?php
include 'koneksi.php';
session_start();

if(isset($_SESSION['nomor_ktp'])){
$userr = mysqli_query($conn,"SELECT * FROM detail_user WHERE nomor_ktp = '$_SESSION[nomor_ktp]'");
$user = mysqli_fetch_assoc($userr);
} else {
  header("location: index.php");
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
    
    <header id="header" class="fixed-top header-scrolled">
        <div class="container d-flex align-items-center">

            <a href="#" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="index.php">Beranda</a></li>
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
                <li class="dropdown"><a href="#" class="active"><span>Surat Rekomendasi</span> <i class="bi bi-chevron-down"></i></a>
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

    <main class="pt-5">

    <section class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pengajuan Surat Keterangan Belum Menikah</h2>
        </div>

        <div class="row">

          <div class="col-lg-12">
            <form action="ajuan.php?kategori_surat=ket_blm_menikah" method="post" role="form" class="php-email-form"  enctype="multipart/form-data">
              <div class="row">
                
                <div class="form-group">
                  <label for="surat_pengantar">Surat Pengantar Kelurahan / Desa</label>
                  <input type="file" class="form-control" name="surat_pengantar" id="formFile">
                </div>
                <div class="form-group">
                  <label for="ktp">Fotocopy KTP</label>
                  <input type="file" class="form-control" name="ktp" id="formFile">
                </div>
                <div class="form-group">
                  <label for="kartu_keluarga">Fotocopy Kartu Keluarga</label>
                  <input type="file" class="form-control" name="kartu_keluarga" id="formFile">
                </div>
                <div class="form-group">
                  <label for="lunas_pbb">Bukti Tanda Lunas PBB Tahun Terakhir</label>
                  <input type="file" class="form-control" name="lunas_pbb" id="formFile">
                </div>
              </div>
              <div class="text-center"><button name="submit" type="submit"
              onclick="return confirm('Pastikan data yang Anda ajukan sudah benar!')">Kirim</button></div>
            </form>
          </div>

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
    <script src="assets/js/main.js"></script>
</body>
</html>