<?php
    session_start();
    include "config.php";

    $id_buku=$_POST['id_buku'];
    $nis=$_SESSION['nis'];
    $tgl=date('Y-m-d');
    $tglkbl=date('Y-m-d', strtotime($tgl. '+ 5 days'));
    $status='belum';

    $sqlpinjam="INSERT INTO pinjam(id_buku, nis, tgl_pinjam, tgl_kembali, status) VALUES('$id_buku', $nis, '$tgl', '$tglkbl', '$status')";
    if($sqldata=mysqli_query($config,$sqlpinjam)){
        header("Location:siswa_pinjam.php");
    } else {
        echo "gagal";
    }
?>
