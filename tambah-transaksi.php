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
        <!-- motong dri sini -->
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form User</h4>
                    <p class="card-description"> Basic form for user </p>
                    <form class="forms-sample" action="proses-tambah-transaksi.php" method="POST">
                      <div class="form-group">
                      <label for="exampleInputName1">Member Name</label>
                      <select name="name" class="form-control">
                         <option></option>
                            <?php
                            include "config/config.php";  // Using database connection file here
                            $records = mysqli_query($conn, "SELECT * FROM member");  // Use select query here 
                                
                            while($member = mysqli_fetch_array($records))
                            {
                                $selected = "";
                            if($member['id_member'] == $data['id_member']){
                                $selected = 'selected';
                            }
                                echo "<option value='". $member['id_member'] ."' ".$selected.">" .$member['name'] ."</option>";  // displaying data in option menu
                            }	?>
                            </select>
                            </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Type Package</label>
                      <select name="type" class="form-control">
                         <option></option>
                            <?php
                            $qry_package=mysqli_query($conn, "select * from package");
                            while($data_package=mysqli_fetch_array($qry_package)){
                              echo '<option value="'.$data_package['id_package'].'">'.$data_package['type'].'</option>';
                            }
                            ?>
                      </select>
                      </div>
                      <div class="form-group">
                        
                        <label for="exampleInputName1">Quantity</label>
                        <input type="text" name="qty" class="form-control" id="exampleInputName1" placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date</label>
                        <input type="date" name="date" class="form-control" id="exampleInputUsername1" placeholder="Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Deadline</label>
                        <input type="date" name="deadline" class="form-control" id="exampleInputPassword1" placeholder="Deadline">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Pay date</label>
                        <input type="date" name="paydate" class="form-control" id="exampleInputPassword1" placeholder="Deadline">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectStatus">Status</label>
                        <select class="form-control" name="status" id="exampleSelectStatus">
                          <option value="new">New</option>
                          <option value="in process">In proses</option>
                          <option value="done">Done</option>
                          <option value="taken">Taken</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectRole">Paid</label>
                        <select class="form-control" name="bayar" id="exampleSelectRole">
                          <option value="paid">Paid</option>
                          <option value="not yet paid">Not yet paid</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Petugas</label>
                    <select name="username" class="form-control">
                        <option></option>
                        <?php
                            include "config/config.php";  // Using database connection file here
                            $qry_user=mysqli_query($conn, "select * from user");
                            while($data_user=mysqli_fetch_array($qry_user)){
                              echo '<option value="'.$data_user['id_user'].'">'.$data_user['username'].'</option>';
                            }
                        ?>
                      </select>
                      </div>
                      </div>

                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <input  class="btn btn-light" type="button" value="cancel" onClick="document.location.href='tambah-member.php';" />
                    </form>
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
