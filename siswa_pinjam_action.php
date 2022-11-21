<?php
    session_start();
    include "config.php";

    if(!isset($_SESSION['nis'])){
      header('Location:login.html');
    }
    $no_buku=$_POST['no_buku'];
    $buku="SELECT * FROM buku WHERE no_buku='$no_buku'";
    $sqlbuku=mysqli_query($config,$buku);
    $hasilbuku=mysqli_fetch_array($sqlbuku);
    if($hasilbuku['no_buku']==$no_buku){
    	header("Location:siswa_pinjam_konfir.php?no_buku=$no_buku");
    } else {
    	header("Location:siswa_pinjam_nobuku.php");
    }

?>