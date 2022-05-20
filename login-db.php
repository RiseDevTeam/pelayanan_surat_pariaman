<?php
    session_start();
    include 'koneksi.php';
    $nomor_ktp = $_POST['nomor_ktp'];
    $password = $_POST['password'];

    $user = mysqli_query($conn,"SELECT * FROM user WHERE nomor_ktp='$nomor_ktp' 
    AND password='$password'");
    $cek = mysqli_num_rows($user);
    if($cek>0){
        $data = mysqli_fetch_assoc($user);
        $_SESSION["nomor_ktp"]= $data["nomor_ktp"];
        if($data['status']=="admin"){
            header("location:admin/beranda.php");
        } else if ($data['status']=="camat"){
            header("location:camat/beranda.php");
        } else {
            header("location:index.php");
        }
    } else {
        ?>
        <script language="JavaScript">
            {
                alert('Username dan Password yg Anda Masukkan Salah');
                javascript:history.back();
            }
        </script> <?php
    }
?>