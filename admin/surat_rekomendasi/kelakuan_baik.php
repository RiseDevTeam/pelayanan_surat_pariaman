<?php
include '../../koneksi.php';
session_start();

if(isset($_SESSION['nomor_ktp'])){
    $userr = mysqli_query($conn,"SELECT * FROM user WHERE nomor_ktp = '$_SESSION[nomor_ktp]'");
    $user = mysqli_fetch_assoc($userr);
    if($user['status']!="admin"){
        echo"<script>
        alert('Anda Bukan Admin!!');
        window.location.href='../../logout.php';
        </script>";
    } else {
    $det_user = mysqli_query($conn,"SELECT * FROM detail_user WHERE nomor_ktp = '$_SESSION[nomor_ktp]'");
    $data_user = mysqli_fetch_assoc($det_user);
    }
    } else {
    echo"
    <script>
        alert('Anda Harus Login Terlebih Dahulu!!');
        window.location.href='../../login.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Aplikasi Pelayanan Perizinan dan Surat Rekomendasi di Kantor Camat Pariaman Tengah</title>
    <!-- Custom CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="../beranda.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Notification -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">
                                    <?php
                                        echo $data_user['nama_lengkap'];
                                    ?>
                                    </span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="../../logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../beranda.php" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Beranda</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="../akun" aria-expanded="false"><i class='bx bxs-user-account bx-sm'></i><span class="hide-menu">Kelola Akun</span></a></li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Surat Izin</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="../surat_izin/bangunan.php"
                                aria-expanded="false"><i class='bx bx-buildings bx-sm'></i><span
                                    class="hide-menu">Surat Izin Bangunan</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../surat_izin/usaha.php" aria-expanded="false" ><i class='bx bx-money-withdraw bx-sm'></i><span
                                    class="hide-menu">Surat Izin Usaha</span></a></li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Surat Rekomendasi</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="../surat_rekomendasi/belum_menikah.php"
                                aria-expanded="false" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Belum Menikah"><i class='bx bx-male-female bx-sm'></i><span
                                    class="hide-menu">Surat Keterangan Belum Menikah</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../surat_rekomendasi/kelakuan_baik.php"
                                aria-expanded="false" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Berkelakuan Baik"><i class='bx bx-book-heart bx-sm'></i><span
                                    class="hide-menu">Surat Keterangan Berkelakuan Baik</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../surat_rekomendasi/meninggal_dunia.php"
                                aria-expanded="false" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Meninggal Dunia"><i class='bx bx-user-x bx-sm'></i><span
                                    class="hide-menu">Surat Keterangan Meninggal Dunia</span></a></li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Pengajuan Surat</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class='bx bx-file bx-sm'></i><span
                                    class="hide-menu">Surat Izin</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="../pengajuan_surat/surat_izin_bangunan/" class="sidebar-link"><span
                                            class="hide-menu"> Surat Izin Bangunan
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../pengajuan_surat/surat_izin_usaha/" class="sidebar-link"><span
                                            class="hide-menu"> Surat Izin Usaha
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class='bx bx-file bx-sm'></i><span
                                    class="hide-menu">Surat Rekomendasi</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="../pengajuan_surat/surat_ket_blm_menikah/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Belum Menikah"><span
                                            class="hide-menu"> Surat Keterangan Belum Menikah
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../pengajuan_surat/surat_ket_klkn_baik/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Berkelakuan Baik"><span
                                            class="hide-menu"> Surat Keterangan Berkelakuan Baik
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../pengajuan_surat/surat_ket_mnggl_dunia/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Meninggal Dunia"><span
                                            class="hide-menu"> Surat Keterangan Meninggal Dunia
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Laporan Surat</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class='bx bxs-report bx-sm'></i><span
                                    class="hide-menu">Surat Izin</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="../laporan_surat/surat_izin_bangunan/" class="sidebar-link"><span
                                            class="hide-menu"> Surat Izin Bangunan
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../laporan_surat/surat_izin_usaha/" class="sidebar-link"><span
                                            class="hide-menu"> Surat Izin Usaha
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class='bx bxs-report bx-sm'></i><span
                                    class="hide-menu">Surat Rekomendasi</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="../laporan_surat/surat_ket_blm_menikah/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Belum Menikah"><span
                                            class="hide-menu"> Surat Keterangan Belum Menikah
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../laporan_surat/surat_ket_klkn_baik/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Berkelakuan Baik"><span
                                            class="hide-menu"> Surat Keterangan Berkelakuan Baik
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="../laporan_surat/surat_ket_mnggl_dunia/" class="sidebar-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keterangan Meninggal Dunia"><span
                                            class="hide-menu"> Surat Keterangan Meninggal Dunia
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="list-divider"></li>

                        <li class="sidebar-item pb-5"> <a class="sidebar-link sidebar-link" href="../../logout.php"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Surat Keterangan Berkelakuan Baik</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda.php" class="text-muted">Beranda</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Surat Rekomendasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <form action="tambah.php?kategori_surat=kelakuan_baik" method="post" enctype="multipart/form-data">

            <?php
                $sql = mysqli_query($conn,"SELECT * FROM surat_rekomendasi WHERE kategori_surat='Surat Keterangan Berkelakuan Baik'");
                
            ?>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <h4 class="card-title">Syarat - Syarat Surat Keterangan Berkelakuan Baik</h4>
                                <div class="form-group">
                                    <textarea class="form-control" id="editor" name="syarat_surat">
                                        <?php 
                                        if(mysqli_num_rows($sql)>0){
                                            $data = mysqli_fetch_assoc($sql);
                                            echo $data['syarat_surat'];
                                        } ?>
                                    </textarea>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary"><!-- Submit</buttton> -->
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
            &copy; Copyright <strong><span>Aplikasi Pelayanan Surat</span></strong>. All Rights Reserved
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    </script>
</body>

</html>