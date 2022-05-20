<?php
include '../../koneksi.php';
session_start();

if(isset($_GET['kategori_surat'])){
    if($_GET['kategori_surat']=="bangunan"){

        $select = mysqli_query($conn,"SELECT * FROM surat_izin
        WHERE kategori_surat = 'Surat Izin Bangunan'");
        $data = mysqli_fetch_assoc($select);
        $filename = $data['formulir_surat'];
        unlink('../../files/formulir_surat/'.$filename);

        $sql = mysqli_query($conn,"UPDATE surat_izin SET formulir_surat = '' 
        WHERE kategori_surat ='Surat Izin Bangunan'");
    } else if($_GET['kategori_surat']=="usaha"){

        $select = mysqli_query($conn,"SELECT * FROM surat_izin
        WHERE kategori_surat = 'Surat Izin Usaha'");
        $data = mysqli_fetch_assoc($select);
        $filename = $data['formulir_surat'];
        unlink('../../files/formulir_surat/'.$filename);

        $sql = mysqli_query($conn,"UPDATE surat_izin SET formulir_surat = '' 
        WHERE kategori_surat ='Surat Izin Usaha'");
    }
    header("Location:".$_GET['kategori_surat'].".php");
} else {
    
}

?>