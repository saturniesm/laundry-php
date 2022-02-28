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
            <?php
            $sql = 'select * from transaction ';
            $result = mysqli_query($conn, $sql);
            ?>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaction Express-Laundry</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> No </th>
                          <th> Member </th>
                          <th> Time Limit </th>
                          <th> Deadline </th>
                          <th> Pay Day </th>
                          <th> Status </th>
                          <th> Payment </th>
                          <th> User </th>
                          <th> Action </th>
                          <th> Details </th>
                          <th> Print </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php 
                      $no = 0; 
                      while($data=mysqli_fetch_array($result)){
                        $sqlUser = "select nama from user where id_user = " . $data["id_user"]. ";";
                        $resultUser = mysqli_query($conn, $sqlUser);
                        $dataUser=mysqli_fetch_array($resultUser);
                        
                        $sqlMember = "select name from member where id_member = " . $data["id_member"]. "";
                        $resultMember = mysqli_query($conn, $sqlMember);
                        $dataMember=mysqli_fetch_array($resultMember);
                        $no++;
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$dataUser['nama']?></td>
                                <td><?=$data['date']?></td>
                                <td><?=$data['deadline']?></td>
                                <td><?=$data['pay_date']?></td>
                                <td><?=$data['status']?></td>
                                <td><?=$data['paid']?></td>
                                <td><?=$dataMember['name']?></td>
                                                
                                <td>
                                <a href="edit-transaksi.php?id_transaction=<?php echo $data['id_transaction']?>"><button class="btn btn-primary px-2">Edit</button></a>
                                <!-- <a class="btn btn-danger px-2" href="hapus_transaksi.php?id_transaksi=<?php echo $data['id_transaksi']?>" onclick="return confirm('Are you sure to delete the data from transaksi <?php echo $data['id_transaksi'] . '?'?>')">Delete</a> -->
                                <td><a href="tampil-detail-transaksi.php?id_transaction=<?php echo $data['id_transaction']?>"><button class="btn btn-primary px-2">Detail</button></a></td>
                                <!-- <td><a target="_blank" class="btn btn-primary" href="cetak.php?id_transaction=<?php //echo $data_transaksi['id_transaction']; ?>">Print</a></td> -->
                                <td><a target="_blank" href="cetak.php?id_transaction=<?php echo $data['id_transaction']?>"><button class="btn btn-primary px-2">Print</button></a></td>

                                </td>
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
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>
