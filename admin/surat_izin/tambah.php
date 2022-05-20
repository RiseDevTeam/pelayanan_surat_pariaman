<?php
include '../../koneksi.php';
session_start();
error_reporting(0);

    if(isset($_POST['submit'])){

        $pname = "(".rand(1000,10000).")".$_FILES['file']['name'];
        $tname = $_FILES['file']['tmp_name'];
        $upload_dir = '../../files/formulir_surat';
        $filee = $_FILES['file']['name'];

        if($_GET['kategori_surat']=="bangunan"){

            $slc = mysqli_query($conn,"SELECT * FROM surat_izin 
            WHERE kategori_surat = 'Surat Izin Bangunan'");
            if(mysqli_num_rows($slc)>0){

                if($filee == ""){
                    $insert = mysqli_query($conn,"UPDATE surat_izin SET
                    syarat_surat = '".$_POST['syarat_surat']."'
                    WHERE kategori_surat = 'Surat Izin Bangunan'");
                } else {
                    $insert = mysqli_query($conn,"UPDATE surat_izin SET
                    syarat_surat = '".$_POST['syarat_surat']."',
                    formulir_surat = '".$pname."'
                    WHERE kategori_surat = 'Surat Izin Bangunan'");
                }

            } else {

                if($filee == ""){
                    $insert = mysqli_query($conn,"INSERT INTO surat_izin(syarat_surat,kategori_surat)
                    VALUES
                    ('".$_POST['syarat_surat']."','Surat Izin Bangunan')");
                } else {
                    $insert = mysqli_query($conn,"INSERT INTO surat_izin(syarat_surat,formulir_surat,kategori_surat)
                    VALUES
                    ('".$_POST['syarat_surat']."','".$pname."','Surat Izin Bangunan')");
                }

            }

            

        } else if($_GET['kategori_surat']=="usaha"){

            $slc = mysqli_query($conn,"SELECT * FROM surat_izin 
            WHERE kategori_surat = 'Surat Izin Usaha'");
            if(mysqli_num_rows($slc)>0){

                if($filee == ""){
                    $insert = mysqli_query($conn,"UPDATE surat_izin SET
                    syarat_surat = '".$_POST['syarat_surat']."'
                    WHERE kategori_surat = 'Surat Izin Usaha'");
                } else {
                    $insert = mysqli_query($conn,"UPDATE surat_izin SET
                    syarat_surat = '".$_POST['syarat_surat']."',
                    formulir_surat = '".$pname."'
                    WHERE kategori_surat = 'Surat Izin Usaha'");
                }

            } else {

                if($filee == ""){
                    $insert = mysqli_query($conn,"INSERT INTO surat_izin(syarat_surat,kategori_surat)
                    VALUES
                    ('".$_POST['syarat_surat']."','Surat Izin Usaha')");
                } else {
                    $insert = mysqli_query($conn,"INSERT INTO surat_izin(syarat_surat,formulir_surat,kategori_surat)
                    VALUES
                    ('".$_POST['syarat_surat']."','".$pname."','Surat Izin Usaha')");
                }

            }


        }

        if($insert){
            move_uploaded_file($tname,$upload_dir.'/'.$pname);
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