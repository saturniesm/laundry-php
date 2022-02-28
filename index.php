<?php
include 'config/config.php';
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Express - Laundry</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <?php
    include "sidebar.php";
    ?>

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-home"></i>
            </span> Selamat Datang,
            <?php
            if (isset($_SESSION['username'])) {
              echo $_SESSION["username"];
            }
            ?>
          </h3>
        </div>
        <!-- motoong dri sini -->

        <div class="row">
            <?php
            $sql = 'select * from transaction';
            $result = mysqli_query($conn, $sql);
            ?>
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <a class="nav-link" href="manage-order.php">
                  <h4 class="card-title">Laporan Pesanan</h4>
                </a>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> ID Pesanan</th>
                        <th> ID Kostumer</th>
                        <th> Status Pesanan</th>
                        <th> Tanggal Pesanan</th>
                        <th> Tanggal Selesai</th>
                        <th> Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  while($data=mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?=$data['id_transaction']?></td>
                        <td><?=$data['id_member']?></td>
                        <td><?=$data['status']?></td>
                        <td><?=$data['date']?></td>
                        <td><?=$data['deadline']?></td>
                        <td><?=$data['paid']?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
      </div>
    </div>
  </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>
