<?php
	session_start();
	include'config.php';

	$id=$_GET['id'];
	$konfirmsql="UPDATE pinjam SET status='sudah' WHERE id=$id";
	if($konfirmdata=mysqli_query($config,$konfirmsql)){
		header('Location:siswa_baru.php');
	} else {
		echo "gagal";
	}

?>