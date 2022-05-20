<?php
include '../../koneksi.php';
session_start();
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Jakarta');

if($_GET['bulan'] == '01'){
    $bln = "Januari";
} else if($_GET['bulan'] == '02'){
    $bln = "Februari";
} else if($_GET['bulan'] == '03'){
    $bln = "Maret";
} else if($_GET['bulan'] == '04'){
    $bln = "April";
} else if($_GET['bulan'] == '05'){
    $bln = "Mei";
} else if($_GET['bulan'] == '06'){
    $bln = "Juni";
} else if($_GET['bulan'] == '07'){
    $bln = "Juli";
} else if($_GET['bulan'] == '08'){
    $bln = "Agustus";
} else if($_GET['bulan'] == '09'){
    $bln = "September";
} else if($_GET['bulan'] == '10'){
    $bln = "Oktober";
} else if($_GET['bulan'] == '11'){
    $bln = "November";
} else if($_GET['bulan'] == '12'){
    $bln = "Desember";
}

if($_GET['kategori']=='blm_menikah'){
    $ktgr = "Surat Keterangan Belum Menikah";
    $loc = "surat_ket_blm_menikah";
    $locc = "surat_keterangan_belum_menikah";
} else if($_GET['kategori']=='klkn_baik'){
    $ktgr = "Surat Keterangan Berkelakuan Baik";
    $loc = "surat_ket_klkn_baik";
    $locc = "surat_keterangan_berkelakuan_baik";
} else if($_GET['kategori']=='mnggl_dunia'){
    $ktgr = "Surat Keterangan Meninggal Dunia";
    $loc = "surat_ket_mnggl_dunia";
    $locc = "surat_keterangan_meninggal_dunia";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=<?php echo $loc; ?>">
    <link rel="stylesheet" href="print.css">
    <title>Laporan <?php echo $ktgr ?> Tahun <?php echo $_GET['tahun'] ?> Bulan <?php echo $bln ?></title>
</head>
<body onload="window.print();">
    <div class="head">
        <img src="../assets/images/logo2.png" class="logo">
        <div class="txt">
            <h1>PEMERINTAHAN KOTA PARIAMAN</h1>
            <h1>KECAMATAN PARIAMAN TENGAH</h1>
            <p>Jl. Jend. Sudirman, Alai Gelombang, Pariaman Tengah,<br> Kota Pariaman, Sumatera Barat</p>
        </div>
    </div>
    <h1>Laporan <?php echo $ktgr ?><br>Tahun <?php echo $_GET['tahun'] ?> di Bulan <?php echo $bln ?></h1>
    <table class="tbl">
        <tr>
            <td>Nama Pengaju</td>
            <td width="150px">Tanggal Surat Dikonfirmasi</td>
            <td width="150px">Tanggal Surat Diajukan</td>   
            <td>Keterangan Surat</td>
        </tr>
    <?php
        $no=1;
        $sql = mysqli_query($conn,"SELECT * FROM laporan_surat_rekomendasi a
        INNER JOIN pengajuan_surat_rekomendasi b
        ON a.id_pengajuan_surat_rekomendasi = b.id_pengajuan_surat_rekomendasi
        WHERE MONTH(a.tanggall)='$_GET[bulan]'
        AND YEAR(a.tanggall)='$_GET[tahun]'
        AND a.kategori_surat = '$ktgr'");
        if(mysqli_num_rows($sql) > 0){
            while($data = mysqli_fetch_array($sql)){
                $peng = mysqli_query($conn,"SELECT * FROM user a
                    INNER JOIN detail_user b
                    ON a.nomor_ktp = b.nomor_ktp
                    WHERE a.id_user = '$data[id_user]'");
                    $ddata = mysqli_fetch_assoc($peng); ?>
            <tr>
                <td><?php echo $ddata['nama_lengkap'] ?></td>
                <td><?php echo $data['tanggall']; ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
            </tr>
    <?php } } ?>
    </table>

    <table class="teble">
        <tr>
            <td>Payakumbuh, <?php
                                $date = strftime('%d %B %Y');
                                echo $date;
                            ?></td>
        </tr>
        <tr>
            <td><b>CAMAT<b></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td><b><?php
            ?><b></td>
        </tr>
        <tr>
            <td>NIP: <?php ?></td>
        </tr>
    </table>
</body>
</html>