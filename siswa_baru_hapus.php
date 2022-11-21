<?php
	session_start();
	include'config.php';

	$id=$_GET['id'];
	$hapussql="DELETE FROM pinjam WHERE id=$id";
	if($hapusdata=mysqli_query($config,$hapussql)){
		header("Location:siswa_baru.php");
	}else {
		echo "gagal";
	}

?>