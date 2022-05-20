<?php
include 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$userr = mysqli_query($conn,"SELECT * FROM user WHERE nomor_ktp = '$_SESSION[nomor_ktp]'");
$user = mysqli_fetch_assoc($userr);

if(isset($_POST['submit'])){
    $date = date("Y-m-d");

    if($_GET['kategori_surat']=="izin_bangunan"){
        $tgl = date("Ymd-hi");

        $ktp = $_FILES['ktp']['name'];
        $tktp = $_FILES['ktp']['tmp_name'];

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $tkartu_keluarga = $_FILES['kartu_keluarga']['tmp_name'];

        $bukti_kepemilikan_tanah = $_FILES['bukti_kepemilikan_tanah']['name'];
        $tbukti_kepemilikan_tanah = $_FILES['bukti_kepemilikan_tanah']['tmp_name'];

        $denah_lokasi = $_FILES['denah_lokasi']['name'];
        $tdenah_lokasi = $_FILES['denah_lokasi']['tmp_name'];

        $rencana_bangunan = $_FILES['rencana_bangunan']['name'];
        $trencana_bangunan = $_FILES['rencana_bangunan']['tmp_name'];

        $persetujuan_tetangga = $_FILES['persetujuan_tetangga']['name'];
        $tpersetujuan_tetangga = $_FILES['persetujuan_tetangga']['tmp_name'];
        
        $pas_foto = $_FILES['pas_foto']['name'];
        $tpas_foto = $_FILES['pas_foto']['tmp_name'];

        $lunas_pbb = $_FILES['lunas_pbb']['name'];
        $tlunas_pbb = $_FILES['lunas_pbb']['tmp_name'];

        $sql = mysqli_query($conn,"INSERT INTO
        pengajuan_surat_izin(id_user,ktp,kartu_keluarga,bukti_kepemilikan_tanah,denah_lokasi,rencana_bangunan,persetujuan_tetangga,pas_foto,lunas_pbb,biaya,kategori_surat,status,tgl,tanggal)
        VALUES
        ('".$user['id_user']."',
        '".$ktp."',
        '".$kartu_keluarga."',
        '".$bukti_kepemilikan_tanah."',
        '".$denah_lokasi."',
        '".$rencana_bangunan."',
        '".$persetujuan_tetangga."',
        '".$pas_foto."',
        '".$lunas_pbb."',
        '".$_POST['biaya']."',
        'Surat Izin Bangunan',
        'Pending',
        '".$tgl."',
        '".$date."')");

        $folder = $user['nomor_ktp']."(".$tgl.")";
        $dir = 'files/pengajuan_surat/surat_izin_bangunan/'.$folder;
        mkdir($dir);

        move_uploaded_file($tktp,$dir.'/'.$ktp);
        move_uploaded_file($tkartu_keluarga,$dir.'/'.$kartu_keluarga);
        move_uploaded_file($tbukti_kepemilikan_tanah,$dir.'/'.$bukti_kepemilikan_tanah);
        move_uploaded_file($tdenah_lokasi,$dir.'/'.$denah_lokasi);
        move_uploaded_file($trencana_bangunan,$dir.'/'.$rencana_bangunan);
        move_uploaded_file($tpersetujuan_tetangga,$dir.'/'.$persetujuan_tetangga);
        move_uploaded_file($tpas_foto,$dir.'/'.$pas_foto);
        move_uploaded_file($tlunas_pbb,$dir.'/'.$lunas_pbb);

        if($sql){
            echo"<script language=JavaScript>
            alert('Data Berhasil Diajukan!');
            window.location.href='izin_bangunan.php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Diajukan!');
            window.location.href='izin_bangunan.php'
            </script>";
        }

    } else if($_GET['kategori_surat']=="izin_usaha"){
        $tgl = date("Ymd-hi");

        $ktp = $_FILES['ktp']['name'];
        $tktp = $_FILES['ktp']['tmp_name'];

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $tkartu_keluarga = $_FILES['kartu_keluarga']['tmp_name'];

        $surat_pengantar = $_FILES['surat_pengantar']['name'];
        $tsurat_pengantar = $_FILES['surat_pengantar']['tmp_name'];

        $formulir_surat = $_FILES['formulir_surat']['name'];
        $tformulir_surat = $_FILES['formulir_surat']['tmp_name'];

        $pas_foto = $_FILES['pas_foto']['name'];
        $tpas_foto = $_FILES['pas_foto']['tmp_name'];

        $sql = mysqli_query($conn,"INSERT INTO
        pengajuan_surat_izin(id_user,surat_pengantar,ktp,kartu_keluarga,pas_foto,formulir_surat,kategori_surat,status,tgl,tanggal)
        VALUES
        ('".$user['id_user']."',
        '".$surat_pengantar."',
        '".$ktp."',
        '".$kartu_keluarga."',
        '".$pas_foto."',
        '".$formulir_surat."',
        'Surat Izin Usaha',
        'Pending',
        '".$tgl."',
        '".$date."')");

        $folder = $user['nomor_ktp']."(".$tgl.")";
        $dir = 'files/pengajuan_surat/surat_izin_usaha/'.$folder;
        mkdir($dir);

        move_uploaded_file($tktp,$dir.'/'.$ktp);
        move_uploaded_file($tkartu_keluarga,$dir.'/'.$kartu_keluarga);
        move_uploaded_file($tsurat_pengantar,$dir.'/'.$surat_pengantar);
        move_uploaded_file($tpas_foto,$dir.'/'.$pas_foto);
        move_uploaded_file($tformulir_surat,$dir.'/'.$formulir_surat);

        if($sql){
            echo"<script language=JavaScript>
            alert('Data Berhasil Diajukan!');
            window.location.href='izin_usaha.php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Diajukan!');
            window.location.href='izin_usaha.php'
            </script>";
        }

    } else if($_GET['kategori_surat']=="ket_blm_menikah"){
        $tgl = date("Ymd-hi");

        $ktp = $_FILES['ktp']['name'];
        $tktp = $_FILES['ktp']['tmp_name'];

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $tkartu_keluarga = $_FILES['kartu_keluarga']['tmp_name'];

        $surat_pengantar = $_FILES['surat_pengantar']['name'];
        $tsurat_pengantar = $_FILES['surat_pengantar']['tmp_name'];

        $lunas_pbb = $_FILES['lunas_pbb']['name'];
        $tlunas_pbb = $_FILES['lunas_pbb']['tmp_name'];

        $sql = mysqli_query($conn,"INSERT INTO
        pengajuan_surat_rekomendasi(id_user,surat_pengantar,ktp,kartu_keluarga,lunas_pbb,kategori_surat,tgl,tanggal)
        VALUES
        ('".$user['id_user']."',
        '".$surat_pengantar."',
        '".$ktp."',
        '".$kartu_keluarga."',
        '".$lunas_pbb."',
        'Surat Keterangan Belum Menikah',
        '".$tgl."',
        '".$date."')");

        $folder = $user['nomor_ktp']."(".$tgl.")";
        $dir = 'files/pengajuan_surat/surat_keterangan_belum_menikah/'.$folder;
        mkdir($dir);

        move_uploaded_file($tktp,$dir.'/'.$ktp);
        move_uploaded_file($tkartu_keluarga,$dir.'/'.$kartu_keluarga);
        move_uploaded_file($tsurat_pengantar,$dir.'/'.$surat_pengantar);
        move_uploaded_file($tlunas_pbb,$dir.'/'.$lunas_pbb);

        if($sql){
            echo"<script language=JavaScript>
            alert('Data Berhasil Diajukan!');
            window.location.href='ket_blm_menikah.php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Diajukan!');
            window.location.href='ket_blm_menikah.php'
            </script>";
        }

    } else if($_GET['kategori_surat']=="ket_klkn_baik"){
        $tgl = date("Ymd-hi");

        $ktp = $_FILES['ktp']['name'];
        $tktp = $_FILES['ktp']['tmp_name'];

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $tkartu_keluarga = $_FILES['kartu_keluarga']['tmp_name'];

        $surat_pengantar = $_FILES['surat_pengantar']['name'];
        $tsurat_pengantar = $_FILES['surat_pengantar']['tmp_name'];

        $lunas_pbb = $_FILES['lunas_pbb']['name'];
        $tlunas_pbb = $_FILES['lunas_pbb']['tmp_name'];

        $pas_foto = $_FILES['pas_foto']['name'];
        $tpas_foto = $_FILES['pas_foto']['tmp_name'];

        $sql = mysqli_query($conn,"INSERT INTO
        pengajuan_surat_rekomendasi(id_user,surat_pengantar,ktp,kartu_keluarga,pas_foto,lunas_pbb,kategori_surat,tgl,tanggal)
        VALUES
        ('".$user['id_user']."',
        '".$surat_pengantar."',
        '".$ktp."',
        '".$kartu_keluarga."',
        '".$pas_foto."',
        '".$lunas_pbb."',
        'Surat Keterangan Berkelakuan Baik',
        '".$tgl."',
        '".$date."')");

        $folder = $user['nomor_ktp']."(".$tgl.")";
        $dir = 'files/pengajuan_surat/surat_keterangan_berkelakuan_baik/'.$folder;
        mkdir($dir);

        move_uploaded_file($tktp,$dir.'/'.$ktp);
        move_uploaded_file($tkartu_keluarga,$dir.'/'.$kartu_keluarga);
        move_uploaded_file($tsurat_pengantar,$dir.'/'.$surat_pengantar);
        move_uploaded_file($tpas_foto,$dir.'/'.$pas_foto);
        move_uploaded_file($tlunas_pbb,$dir.'/'.$lunas_pbb);

        if($sql){
            echo"<script language=JavaScript>
            alert('Data Berhasil Diajukan!');
            window.location.href='ket_klkn_baik.php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Diajukan!');
            window.location.href='ket_klkn_baik.php'
            </script>";
        }
        
    } else if($_GET['kategori_surat']=="ket_mnggl_dunia"){
        $tgl = date("Ymd-hi");

        $ktp = $_FILES['ktp']['name'];
        $tktp = $_FILES['ktp']['tmp_name'];

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $tkartu_keluarga = $_FILES['kartu_keluarga']['tmp_name'];

        $surat_pengantar = $_FILES['surat_pengantar']['name'];
        $tsurat_pengantar = $_FILES['surat_pengantar']['tmp_name'];

        $sql = mysqli_query($conn,"INSERT INTO
        pengajuan_surat_rekomendasi(id_user,surat_pengantar,ktp,kartu_keluarga,kategori_surat,tgl,tanggal)
        VALUES
        ('".$user['id_user']."',
        '".$surat_pengantar."',
        '".$ktp."',
        '".$kartu_keluarga."',
        'Surat Keterangan Meninggal Dunia',
        '".$tgl."',
        '".$date."')");

        $folder = $user['nomor_ktp']."(".$tgl.")";
        $dir = 'files/pengajuan_surat/surat_keterangan_meninggal_dunia/'.$folder;
        mkdir($dir);

        move_uploaded_file($tktp,$dir.'/'.$ktp);
        move_uploaded_file($tkartu_keluarga,$dir.'/'.$kartu_keluarga);
        move_uploaded_file($tsurat_pengantar,$dir.'/'.$surat_pengantar);

        if($sql){
            echo"<script language=JavaScript>
            alert('Data Berhasil Diajukan!');
            window.location.href='ket_mnggl_dunia.php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Diajukan!');
            window.location.href='ket_mnggl_dunia.php'
            </script>";
        }
        
    }

} else {

}
?>