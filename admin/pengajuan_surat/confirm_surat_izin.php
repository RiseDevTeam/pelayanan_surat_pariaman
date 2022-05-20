<?php
include '../../koneksi.php';
session_start();

    if(isset($_POST['submit'])){

        if($_GET['kategori_surat']=="bangunan"){

            $upload_dir = '../../files/pengajuan_surat/surat_izin_bangunan/';
            $kategori_surat = 'Surat Izin Bangunan';
            $loc = 'surat_izin_bangunan/';

        } else if($_GET['kategori_surat']=="usaha"){

            $upload_dir = '../../files/pengajuan_surat/surat_izin_usaha/';
            $kategori_surat = 'Surat Izin Usaha';
            $loc = 'surat_izin_usaha/';

        }

        $pname = "(".rand(1000,10000).")".$_FILES['file']['name'];
        $tname = $_FILES['file']['tmp_name'];

        $upd = mysqli_query($conn,"UPDATE pengajuan_surat_izin SET
        status = 'Dikonfirmasi'
        WHERE id_pengajuan_surat_izin = '$_GET[id_pengajuan_surat_izin]'");

        $sql = mysqli_query($conn,"SELECT * FROM pengajuan_surat_izin 
        WHERE id_pengajuan_surat_izin = '$_GET[id_pengajuan_surat_izin]'");
        $data = mysqli_fetch_assoc($sql);

        $akn = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$data[id_user]'");
        $akun = mysqli_fetch_assoc($akn);

        $date = date("Y-m-d");

        $ins = mysqli_query($conn,"INSERT INTO laporan_surat_izin(id_pengajuan_surat_izin,id_user,file_surat_izin,kategori_surat,keterangan,tanggall)
        VALUES
        ('".$data['id_pengajuan_surat_izin']."',
        '".$data['id_user']."',
        '".$pname."',
        '".$kategori_surat."',
        '".$_POST['keterangan']."',
        '".$date."')");

        $folder = $akun['nomor_ktp']."(".$data['tgl'].")";

        move_uploaded_file($tname,$upload_dir.$folder.'/'.$pname);

        if($ins&&$upd){
            echo"<script language=JavaScript>
            alert('Surat Berhasil Diupdate!');
            window.location.href='".$loc."'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Surat Gagal Diupdate!');
            window.location.href='".$loc."'
            </script>";
        }
    }
?>