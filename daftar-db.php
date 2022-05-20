<?php
include 'koneksi.php';

    $insert = mysqli_query($conn,"INSERT INTO user(nomor_ktp,password,status) VALUES
    ('".$_POST['nomor_ktp']."','".$_POST['password']."','user')");

    $insertt = mysqli_query($conn,"INSERT INTO detail_user(nomor_ktp,nama_lengkap,nip,nomor_telepon,alamat) VALUES
    ('".$_POST['nomor_ktp']."',
    '".$_POST['nama_lengkap']."',
    '".$_POST['nip']."',
    '".$_POST['nomor_telepon']."',
    '".$_POST['alamat']."')");

    if($insert&&$insertt){
        echo"
            <script type='text/javascript'>
                alert('Akun Berhasil Didaftarkan!')
                window.location.href = 'daftar.php';
            </script>
        ";
    } else { ?>
            <script type='javascript'>
                alert('Akun Gagal Didaftarkan!')
                window.location.href = 'daftar.php';
            </script>
    <?php }
?>