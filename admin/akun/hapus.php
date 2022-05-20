<?php
include '../../koneksi.php';
session_start();

if(isset($_GET['nomor_ktp'])){
    $delete = mysqli_query($conn,"DELETE FROM detail_user WHERE nomor_ktp = '$_GET[nomor_ktp]'");
    $deletee = mysqli_query($conn,"DELETE FROM user WHERE nomor_ktp = '$_GET[nomor_ktp]'");
    header("Location:index.php");
} else {
    
}

?>