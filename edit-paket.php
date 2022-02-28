<?php
if($_GET){
    include 'config/config.php';

    $id_package = $_GET['id_package'];

    $query = "SELECT * FROM package WHERE id_package = '$id_package'";

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
                    <h4 class="card-title">Update Form Package</h4>
                    <p class="card-description"> Basic form update package </p>
                    <form class="forms-sample" action="proses-edit-paket.php?id_package=<?echo $data['id_package']?>" method="POST">
                    <input type="hidden" name="id_package" type="hidden" value="<?=$data['id_package']?>">
                      <div class="form-group">
                        <label for="exampleSelectType">Type</label>
                        <select class="form-control" name="type" value="<?=$data['type']?>" id="exampleSelectType">
                          <option value="kiloan" <?php if($data['type']=="kiloan") echo 'selected="selected"'; ?>>Kiloan</option>
                          <option value="selimut"<?php if($data['type']=="selimut") echo 'selected="selected"'; ?>>Blanket<?php if($data['type']=="blanket") echo 'selected="selected"'; ?></option>
                          <option value="sprei"<?php if($data['type']=="bed cover") echo 'selected="selected"'; ?>>Bed cover</option>
                          <option value="kaos"<?php if($data['type']=="kaos") echo 'selected="selected"'; ?>>Shirt</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="number" name="price" class="form-control" value="<?=$data['price']?>" id="exampleInputPrice1" placeholder="Price">
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
