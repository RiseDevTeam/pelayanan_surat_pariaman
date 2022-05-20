<?php
    $conn = mysqli_connect('localhost', 'root', '', 'pelayanan_surat');
    if (mysqli_connect_errno()) {
        echo "Connection Failed: ". mysqli_connect_error();
    }
?>