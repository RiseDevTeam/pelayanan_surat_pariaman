<?php
include '../../koneksi.php';
session_start();

    if(isset($_POST['submit'])){
        $date = date("Y-m-d");

        if($_GET['kategori_surat']=="blm_menikah"){

            $upload_dir = '../../files/pengajuan_surat/surat_keterangan_belum_menikah/';
            $kategori_surat = 'Surat Keterangan Belum Menikah';
            $loc = 'surat_ket_blm_menikah/';

        } else if($_GET['kategori_surat']=="klkn_baik"){

            $upload_dir = '../../files/pengajuan_surat/surat_keterangan_berkelakuan_baik/';
            $kategori_surat = 'Surat Keterangan Berkelakuan Baik';
            $loc = 'surat_ket_klkn_baik/';

        } else if($_GET['kategori_surat']=="mnggl_dunia"){

            $upload_dir = '../../files/pengajuan_surat/surat_keterangan_meninggal_dunia/';
            $kategori_surat = 'Surat Keterangan Meninggal Dunia';
            $loc = 'surat_ket_mnggl_dunia/';

        }

        $pname = "(".rand(1000,10000).")".$_FILES['file']['name'];
        $tname = $_FILES['file']['tmp_name'];

        $sql = mysqli_query($conn,"SELECT * FROM pengajuan_surat_rekomendasi 
        WHERE id_pengajuan_surat_rekomendasi = '$_GET[id_pengajuan_surat_rekomendasi]'");
        $data = mysqli_fetch_assoc($sql);

        $akn = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$data[id_user]'");
        $akun = mysqli_fetch_assoc($akn);

        $ins = mysqli_query($conn,"INSERT INTO laporan_surat_rekomendasi(id_pengajuan_surat_rekomendasi,id_user,file_surat_rekomendasi,kategori_surat,keterangan,tanggall)
        VALUES
        ('".$data['id_pengajuan_surat_rekomendasi']."',
        '".$data['id_user']."',
        '".$pname."',
        '".$kategori_surat."',
        '".$_POST['keterangan']."',
        '".$date."')");

        $folder = $akun['nomor_ktp']."(".$data['tgl'].")";

        move_uploaded_file($tname,$upload_dir.$folder.'/'.$pname);

        if($ins){
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