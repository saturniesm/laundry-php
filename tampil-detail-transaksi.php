<?php
include 'config/config.php';
session_start();

if (!isset($_SESSION['username'])) {
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

    <?php
        include 'config/config.php';
            $sql = 'select * from detail_transaction';
            $tr_id = $_GET["id_transaction"];
            $query = mysqli_query($conn, "SELECT *
                            FROM detail_transaction
                            JOIN package ON package.id_package = detail_transaction.id_package
                            WHERE detail_transaction.id_transaction = '$tr_id'");
            $detail = mysqli_fetch_array($query);
            $result = mysqli_query($conn, $sql);
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

        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Member Express-Laundry</h4>
                    <p class="card-description"> sembarang wes bingung isine</p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Transaction </th>
                          <th> Paket </th>
                          <th> Harga </th>
                          <th> Quantity </th>
                          <th> Sub Total </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                            <td><?=$detail['id_detail_transaction'];?></td>
                            <td><?=$detail['id_transaction'];?></td>
                            <td><?=$detail['type'];?></td>
                            <td>Rp.<?=$detail['price'];?>,-</td>
                            <td><?=$detail['qty']?></td>
                            <td><?=$detail['qty']*$detail['price']?></td>
                        </tr>
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
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>
