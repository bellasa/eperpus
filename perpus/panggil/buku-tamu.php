<div class="container" id="buku-tamu">
<?php
if (isset($_POST['kirim'])) {
	$query = mysqli_query($db, "INSERT INTO tgr_buku_tamu VALUES('','$_POST[nama]','$_POST[kelas]','$_POST[keperluan]','$tgl')");
	header("location:#buku-tamu");
}
?>
<h3>Buku Tamu | <a href="#" onclick="return confirm('Perbarui Data Excel Buku Tamu?')">Perbarui Excel Buku Tamu</a></h3>
<form class="inputan" action="" method="post">
	<input required="" type="text" name="nama" style="width:30%" id="short" placeholder="Nama">
	<select name="kelas" required="" style="width:10%">
		<option value="">-KELAS</option>
		<option value="">--KELAS 7</option>
		<option>7.1</option>
		<option>7.2</option>
		<option>7.3</option>
		<option>7.4</option>
		<option>7.5</option>
		<option>7.6</option>
		<option>7.7</option>
		<option>7.8</option>
		<option>7.9</option>
		<option value="">--KELAS 8</option>
		<option>8.1</option>
		<option>8.2</option>
		<option>8.3</option>
		<option>8.4</option>
		<option>8.5</option>
		<option>8.6</option>
		<option>8.7</option>
		<option>8.8</option>
		<option>8.9</option>
		<option value="">--KELAS 9</option>
		<option>9.1</option>
		<option>9.2</option>
		<option>9.3</option>
		<option>9.4</option>
		<option>9.5</option>
		<option>9.6</option>
		<option>9.7</option>
		<option>9.8</option>
		<option>9.9</option>
		<option>9.10</option>
	</select>
	<input type="date" name="tanggal" style="width:20%" value="<?php echo date('Y-m-d')?>">
	<input type="text" name="keperluan" required="" id="short" style="width:30%" placeholder="Keperluan">
	<input type="submit" name="kirim" value="Kirim" style="width:8%">
</form>
<br><br>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Keperluan</th>
		<th>Tanggal</th>
		<th>Hapus</th>
	</tr>
	<?php
	if (isset($_POST['hapus_bukutamu'])) {
		$query = mysqli_query($db, "DELETE FROM tgr_buku_tamu WHERE id = '$_POST[hapus_bukutamu]'");
		if ($query) {
		echo "<div class='alert alert-info'>Berhasil Menghapus Data</div>";
		}
		else{
		echo "<div class='alert alert-warning'>Gagal Menghapus Data</div>";
		}
		header("location:#buku-tamu");
	}
	$no_tamu = 1;
	$querytamu = mysqli_query($db, "SELECT*FROM tgr_buku_tamu ORDER BY id DESC");
	if (mysqli_num_rows($querytamu) < 1) {
		echo "<div class='alert alert-warning'>Tidak Ada Data</div>";
	}
	while ($tamu = mysqli_fetch_array($querytamu)) {
	?>
	<tr>
		<td><?php echo $no_tamu;?>.</td>
		<td><?php echo $tamu['nama'];?></td>
		<td><?php echo $tamu['kelas'];?></td>
		<td><?php echo $tamu['keperluan'];?></td>
		<td><?php echo $tamu['tanggal'];?></td>
		<td><form method="post"><button class="btn btn-link" type="submit" onclick="return confirm ('Hapus?')" name="hapus_bukutamu" value="<?php echo $tamu['id'];?>"><img class="crud" style="margin-top:-10px;" class="crud" src="./tampilan/ikon/hapus.png"></button></form></td>
	</tr>
	<?php
	$no_tamu++;
}
	?>
</table>
</div>