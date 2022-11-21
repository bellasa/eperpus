<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Perpus</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >
     <?php
    session_start();
    include "config.php";

    if(!isset($_SESSION['nis'])){
      header('Location:login.html');
    }

    ?>
    <a href="index.php" class="text-decoration-none">
      <div class="bg-gradient-primary p-5" style="height: 300px;color: white">
      <center>
        <i class="fas fa-book" style="font-size: 50px"></i>
        <h1>E-Perpus</h1>
      </center>
    </div></a>

    <div class="container-fluid">
      <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px">
        <center>
          <h5 class="mt-3 mb-5">Pinjam Buku Baru</h5>
        </center>

        <form action="siswa_pinjam_action.php" method="POST">
          <div class="form-group">
            <input type="text" name="no_buku" class="form-control" placeholder="Nomor Buku">
          </div>
          <div class="form-group">
            <center>
              <input type="submit" class="btn btn-success" value="Pinjam" >
            </center>
          </div>
        </form>

      </div>
    </div>

    <div class="container-fluid">
      <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-3 mt-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px">
        <center>
          <h5 class="mt-3 mb-5">Daftar Pinjaman</h5>
        </center>
        Mintalah konfirmasi peminjaman buku ke petugas setelah itu pastikan pinjaman anda ada di list dibawah.

        <div>
          <table class="table table-bordered">
            <thead>
              <tr class="table-active">
                <th>ID</th>
                <th>Judul</th>
                <th>Tanggal Kembali</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $nis=$_SESSION['nis'];
                $pinjamsql="SELECT * FROM pinjam INNER JOIN buku ON pinjam.id_buku = buku.id_buku WHERE nis=$nis AND status='sudah' ORDER BY id ASC";
                $pinjamhasil=mysqli_query($config, $pinjamsql);
                while ($pinjamdata=mysqli_fetch_array($pinjamhasil)){
              ?>
              <tr>
                <td><?php echo $pinjamdata['id']; ?></td>
                <td><?php echo $pinjamdata['judul']; ?></td>
                <td><?php echo $pinjamdata['tgl_kembali']; ?></td>
              </tr>
              <?php
              };?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
     <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bella Saputra 2020</span>
          </div>
        </div>
      </footer>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>