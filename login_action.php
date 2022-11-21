<?php
	session_start();
	include "config.php";
	$nis=$_POST['nis'];
	$password=$_POST['password'];
	$sql="SELECT * FROM siswa WHERE nis=$nis AND password='$password'";
	$data=mysqli_query($config,$sql);
	if($hasil=mysqli_fetch_array($data)){
			$_SESSION['nis']=$hasil['nis'];
			$_SESSION['nama']=$hasil['nama'];
			$_SESSION['kelas']=$hasil['kelas'];
			header("Location:index.php");
	} else {
		echo "gagal";
       }
?>