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

    <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px">
   <!--      <h5>Selamat Datang </h5> -->
        <table>
          <?php
          $hrini=date('Y-m-d');
          $nis=$_SESSION['nis'];
          $tglsql="SELECT * FROM absen WHERE nis=$nis ORDER BY tanggal DESC LIMIT 1";
          $tglconf=mysqli_query($config,$tglsql);
          $tgl=mysqli_fetch_array($tglconf);
          ?>
          <tr>
            <td  width="70"><b>Nama</b></td>
            <td>:</td>
            <td><?php echo $_SESSION['nama'];?></td>
          </tr>
          <tr>
            <td><b>Kelas</b></td>
            <td>:</td>
            <td><?php echo $_SESSION['kelas'];?></td>
          </tr>
          <tr>
            <td><b>Absen</b></td>
            <td>:</td>
            <td><?php
              if($tgl['tanggal']==$hrini){
                echo "Sudah Absen";
              } else {
                echo "Belum Absen";
              }
              ?>
            </td>
          </tr>
        </table>
    </div>


    <?php
    if($tgl['tanggal']!==$hrini){
      
    ?>

    <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-5 mt-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px;" >
      <center>
      <i class="fas fa-user text-warning m-3" style="font-size: 100px;"></i><br>
        <button class="btn btn-warning text-white" data-toggle="modal" data-target="#exampleModal">Absen</button>
      </center>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Pastikan anda sudah datang ke Perpustakaan</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
              <a href="absen_action.php?nis=<?php echo $_SESSION['nis'];?>" class="btn btn-primary">Sudah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    } else {
    ?>

    <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-5 mt-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px">
      <center>
      <i class="fas fa-book text-success m-3" style="font-size: 100px;"></i><br>
        <a class="btn btn-success text-white" href="siswa_pinjam.php">Pinjam Buku</a>
      </center>
    </div>
  <?php } ?>
    <div class="col-md-4 offset-md-4 col-10 offset-1 rounded p-5 mt-3" style="background-color: white;box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.2);top: -100px">
      <center>
        <a class="btn btn-primary text-white" href="logout.php">Logout</a>
      </center>
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