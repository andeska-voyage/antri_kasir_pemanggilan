<?php
error_reporting(0);
$tgl_sekarang = date("Y-m-d");
include "conf/koneksi.php";
$sql_cari_data_antrian="select reg_periksa.kd_poli, reg_periksa.no_rawat, reg_periksa.no_rkm_medis, pasien.nm_pasien, dokter.nm_dokter, dokter.kd_dokter FROM `reg_periksa` INNER JOIN pasien INNER JOIN dokter WHERE dokter.kd_dokter = reg_periksa.kd_dokter AND reg_periksa.no_rkm_medis=pasien.no_rkm_medis AND reg_periksa.tgl_registrasi = '$tgl_sekarang'";
// current_date()
$sql_jumlah = $conect->query($sql_cari_data_antrian);
$cek_row = mysqli_num_rows($sql_jumlah);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <!-- <meta http-equiv="refresh" content="5" /> -->
    <title>Pemanggilan Antrian Kasir</title>
    <link rel="icon" type="image/x-icon" href="assets/img/kasir.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/">

   

   <!-- Custom fonts for this template -->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
  <!-- Custom styles for this template -->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<!-- <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this page -->
<link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- <script type="text/javascript">
      function dataTable(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          document.getElementById("load").innerHTML = this.responseText;
        }
        xhttp.open("GET", "load.php");
        xhttp.send();
      }
        setInterval(function(){
        }, 1);
    </script> -->
    
    <!-- Custom styles for this template -->
    <link href="assets/offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<!-- <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation" >
  <div class="container-fluid">
    
  </div>
</nav> -->
    <ul class="navbar navbar-expand-lg fixed-top navbar-dark bg-light justify-content-center" aria-label="Main navigation">
      <li class="nav-item">
        <a class="navbar-brand">
          <img src="assets/img/logo.png" alt="" width="120" height="30" class="d-inline-block align-text-top" style="margin-right: 20px;">
        </a>
      </li>
    </ul>

<div class="nav-scroller shadow-sm bg-purple">
  <nav class="nav nav-underline" aria-label="Secondary navigation">
    <a class="nav-link text-white active" aria-current="page" href="http://192.168.0.21/kantor/app/page/bridging/">Dashboard</a>
    <a class="nav-link text-white" href="http://192.168.0.21/taskid/">Cek Task ID</a>
    <a class="nav-link text-white" href="#">
      Data Pendaftaran Masuk
      <span class="badge bg-light text-dark rounded-pill align-text-bottom"><?php echo $cek_row; ?></span>
    </a>
    <!-- <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a> -->
  </nav>
</div>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3" src="assets/img/kasir.png" alt="" width="48" height="38" style="margin-right:5px;">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Aplikasi Pemanggilan Antrian Loket Kasir</h1>
      
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Registrasi Poli Hari Ini <?php echo"$tgl_sekarang"; ?></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>No.Rawat</th>
                <th>No.Rekam Medis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>No.Rawat</th>
                <th>No.Rekam Medis</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
                // $poli="'IGDK','U0001','U0002','U0037','U0038'";
                    $no = 1;
                    $sql = $conect->query($sql_cari_data_antrian);
                    while ($data=$sql->fetch_assoc()) {                           
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_pasien'];?></td>
                  <td><?php echo $data['nm_dokter'];?></td>
                  <td><?php echo $data['no_rawat'];?></td>
                  <td><?php echo $data['no_rkm_medis'];?></td>
                  <td style="text-align:center;width: auto;">
                    <form method="post" action="index.php">
                        <input type="hidden" name="no_rawat" value="<?php echo $data['no_rawat'];?>"><br/>
                        <input type="hidden" name="no_rkm_medis" value="<?php echo $data['no_rkm_medis'];?>"><br/>
                        <input type="hidden" name="nm_pasien" value="<?php echo $data['nm_pasien'];?>"><br/>
                        <input type="hidden" name="nm_dokter" value="<?php echo $data['nm_dokter'];?>"><br/>
                        <input type="hidden" name="kd_dokter" value="<?php echo $data['kd_dokter'];?>"><br/>
                        <input type="hidden" name="kd_poli" value="<?php echo $data['kd_poli'];?>"><br/>
                        <button type="submit" class="btn btn-secondary btn-icon-split" style="position: relative; top: -40px;" onclick="return confirm('Yakin S-O-A-P Sudah Diisi Perawat Poli?')">
                          <span class="icon text-white-50">
                            <i class="fas fa-microphone"></i>
                          </span>
                          <span class="text">Panggil</span>
                        </button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
       </div> 
    </div>
  </div> 

</main>

<?php
// 
$no_rawat = $_POST['no_rawat'];
$no_rkm_medis = $_POST['no_rkm_medis'];
$nm_pasien = $_POST['nm_pasien'];
$nm_dokter = $_POST['nm_dokter'];
$kd_dokter = $_POST['kd_dokter'];
$kd_poli = $_POST['kd_poli'];
// 
// echo $no_rawat.$no_rkm_medis.$nm_pasien.$nm_dokter.$kd_dokter.$kd_poli;
// 
$delete_status=(mysqli_query($conect, "DELETE from antrikasir where kd_dokter='$kd_dokter' and kd_poli='$kd_poli'"));
$input_status=(mysqli_query($conect, "INSERT INTO antrikasir VALUES ('$kd_dokter','$kd_poli','1','$no_rawat')"));
?>

<div class="card" style="text-align:center;">
  <h5 class="card-header"></h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <footer>&copy; Copyright 2024 Bootstrap5.Andeska Mawardi, S.Kom</footer>
    <a href="https://github.com/andeska-voyage" class="btn btn-primary" target="_blank">Silahkan Berkunjung</a>
  </div>
</div>



    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/offcanvas.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script>
            $(function () {
                $("#dataTable").dataTable();
            });
            //  mesetTiout(function() {
            //  location.reload();
            //  }, 15000);
    </script>
  </body>
</html>
