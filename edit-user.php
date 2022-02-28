<?php
if($_GET){
    include 'config/config.php';

    $id_user = $_GET['id_user'];

    $query = "SELECT * FROM user WHERE id_user = '$id_user'";

    $sql = mysqli_query($conn, $query);
    //sebuah query hsil e objek.. mysqli_fetch_assoc untuk mengeluarkan sebuah data dri query
    $data = mysqli_fetch_assoc($sql);
}
?>
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
        <!-- motoong dri sini -->
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Form User</h4>
                    <p class="card-description"> Basic form update user </p>
                    <form class="forms-sample" action="proses-edit-user.php?id_user=<?echo $data['id_user']?>" method="POST">
                    <input type="hidden" name="id_user" type="hidden" value="<?=$data['id_user']?>">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="<?=$data['nama']?>" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="username" value="<?=$data['username']?>" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" name="password" class="form-control" value="<?=$data['password']?>" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectRole">Role</label>
                        <select class="form-control" name="role" value="<?=$data['role']?>" id="exampleSelectRole">
                          <option value="admin">Admin</option>
                          <option value="cashier">Cashier</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
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
