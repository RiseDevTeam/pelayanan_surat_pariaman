<?php
include '../../koneksi.php';

$bln = intval($_GET['bulan']);
$thn = intval($_GET['tahun']);

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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style>
        .img embed {
            width: 200px;
            height: 250px;
        }
    </style>
</head>
<body>
    <table id="zero_config" class="table table-bordered no-wrap table-hover ">
        <thead class="bg-primary text-white">
            <tr>
                <th>Nomor KTP</th>
                <th>Tanggal Surat Diajukan</th>
                <th>Tanggal Surat Dikonfirmasi</th>
                <th>Keterangan Surat</th>
                <th>File Surat</th>
            </tr>
        </thead>
        <tbody class="border border-primary">

        <?php
        $sql = mysqli_query($conn,"SELECT * FROM laporan_surat_rekomendasi a
        INNER JOIN pengajuan_surat_rekomendasi b
        ON a.id_pengajuan_surat_rekomendasi = b.id_pengajuan_surat_rekomendasi
        WHERE MONTH(a.tanggall)='$bln' AND YEAR(a.tanggall)='$thn'
        AND a.kategori_surat = '$ktgr'");
        
            if(mysqli_num_rows($sql)>0){
                while($data = mysqli_fetch_array($sql)){
                    $peng = mysqli_query($conn,"SELECT * FROM user a
                    INNER JOIN detail_user b
                    ON a.nomor_ktp = b.nomor_ktp
                    WHERE a.id_user = '$data[id_user]'");
                    $ddata = mysqli_fetch_assoc($peng);
                    $folder = $ddata['nomor_ktp']."(".$data['tgl'].")";
        ?>
            <tr>
                <td data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $ddata['nama_lengkap'] ?>">
                <?php echo $ddata['nomor_ktp']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['tanggall']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td>
                <embed src="../../../files/pengajuan_surat/<?php echo $locc ?>/<?php echo $folder ?>/<?php echo $data['file_surat_rekomendasi'] ?>"
                style="width: 200px;">
                </td>
            </tr>
        <?php } } else { ?>
            <tr>
                <td colspan="5" style="text-align: center">Tidak Ada Data Surat Di Tahun / Bulan Ini</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../../dist/js/app-style-switcher.js"></script>
    <script src="../../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="../../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>
</html>