<?php
include '../../koneksi.php';
session_start();
error_reporting(0);

    if(isset($_POST['submit'])){

        if($_GET['kategori_surat']=="belum_menikah"){

            $sql = mysqli_query($conn,"SELECT * FROM surat_rekomendasi
            WHERE kategori_surat = 'Surat Keterangan Belum Menikah'");
            if(mysqli_num_rows($sql)>0){
                $insert = mysqli_query($conn,"UPDATE surat_rekomendasi SET
                syarat_surat = '".$_POST['syarat_surat']."'
                WHERE kategori_surat = 'Surat Keterangan Belum Menikah'");
            } else {
                $insert = mysqli_query($conn,"INSERT INTO surat_rekomendasi(syarat_surat,kategori_surat)
                VALUES
                ('".$_POST['syarat_surat']."',
                'Surat Keterangan Belum Menikah')");
            }

        } else if($_GET['kategori_surat']=="kelakuan_baik"){

            $sql = mysqli_query($conn,"SELECT * FROM surat_rekomendasi
            WHERE kategori_surat = 'Surat Keterangan Berkelakuan Baik'");
            if(mysqli_num_rows($sql)>0){
                $insert = mysqli_query($conn,"UPDATE surat_rekomendasi SET
                syarat_surat = '".$_POST['syarat_surat']."'
                WHERE kategori_surat = 'Surat Keterangan Berkelakuan Baik'");
            } else {
                $insert = mysqli_query($conn,"INSERT INTO surat_rekomendasi(syarat_surat,kategori_surat)
                VALUES
                ('".$_POST['syarat_surat']."',
                'Surat Keterangan Berkelakuan Baik')");
            }

        } else if($_GET['kategori_surat']=="meninggal_dunia"){

            $sql = mysqli_query($conn,"SELECT * FROM surat_rekomendasi
            WHERE kategori_surat = 'Surat Keterangan Meninggal Dunia'");
            if(mysqli_num_rows($sql)>0){
                $insert = mysqli_query($conn,"UPDATE surat_rekomendasi SET
                syarat_surat = '".$_POST['syarat_surat']."'
                WHERE kategori_surat = 'Surat Keterangan Meninggal Dunia'");
            } else {
                $insert = mysqli_query($conn,"INSERT INTO surat_rekomendasi(syarat_surat,kategori_surat)
                VALUES
                ('".$_POST['syarat_surat']."',
                'Surat Keterangan Meninggal Dunia')");
            }

        }

        if($insert){
            echo"<script language=JavaScript>
            alert('Data Berhasil Ditambahkan!');
            window.location.href='".$_GET['kategori_surat'].".php'
            </script>";
        } else {
            echo"<script language=JavaScript>
            alert('Data Gagal Ditambahkan!');
            window.location.href='".$_GET['kategori_surat'].".php'
            </script>";
        }
    }
?>