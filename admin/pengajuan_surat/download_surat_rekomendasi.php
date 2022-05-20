<?php
include '../../koneksi.php';
if($_GET['kategori_surat']=="blm_menikah"){
    $loc = "surat_keterangan_belum_menikah/";
} else if($_GET['kategori_surat']=="klkn_baik"){
    $loc = "surat_keterangan_berkelakuan_baik/";
} else if($_GET['kategori_surat']=="mnggl_dunia"){
    $loc = "surat_keterangan_meninggal_dunia/";
}
$sql = mysqli_query($conn,"SELECT * FROM pengajuan_surat_rekomendasi
WHERE id_pengajuan_surat_rekomendasi = '$_GET[id_pengajuan_surat_rekomendasi]'");
$data = mysqli_fetch_assoc($sql);

$akn = mysqli_query($conn,"SELECT * FROM user WHERE id_user = '$data[id_user]'");
$akun = mysqli_fetch_assoc($akn);

$dir=$akun['nomor_ktp']."(".$data['tgl'].")";
$filename=$data[$_GET['file']];
$file_path="../../files/pengajuan_surat/".$loc.$dir."/".$filename;
$ctype="application/octet-stream";
//
if(!empty($file_path) && file_exists($file_path)){ //check keberadaan file
  header("Pragma:public");
  header("Expired:0");
  header("Cache-Control:must-revalidate");
  header("Content-Control:public");
  header("Content-Description: File Transfer");
  header("Content-Type: $ctype");
  header("Content-Disposition:attachment; filename=\"".basename($file_path)."\"");
  header("Content-Transfer-Encoding:binary");
  header("Content-Length:".filesize($file_path));
  flush();
  readfile($file_path);
  exit();
}else{
  echo "The File does not exist.";
}
?>