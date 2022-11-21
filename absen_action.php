<?php
    session_start();
	include 'config.php';
    if(!isset($_SESSION['nis'])){
      header('Location:login.html');
    }

	$nis=$_GET['nis'];
	$tanggal=date('Y-m-d');
	$cek="SELECT * FROM absen WHERE nis=$nis ORDER BY tanggal DESC LIMIT 1";
	$cekdata=mysqli_query($config,$cek);
	$cekhasil=mysqli_fetch_array($cekdata);
	if($cekhasil['tanggal']==$tanggal){
      header("Location:index.php?abs=sudah");
	}else{
		$sql="INSERT INTO absen(nis, tanggal) VALUES($nis, '$tanggal')";
		if($sqldata=mysqli_query($config,$sql)){
			header("Location:index.php");
		}
	}

?>