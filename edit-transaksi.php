<?php
if($_GET){
    include 'config/config.php';
    session_start();

    if (!isset($_SESSION['username'])) {
      header("Location: login.php");
    }
    // $id_trans = $_GET['id_transaction'];

    // $query = "SELECT * FROM transaction WHERE id_transaction = '$id_trans'";

    // $sql = mysqli_query($conn, $query);
    // //sebuah query hsil e objek.. mysqli_fetch_assoc untuk mengeluarkan sebuah data dri query
    // $data = mysqli_fetch_assoc($sql);
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
            include 'config/config.php';

            $trans = $_GET['id_transaction'];
                $query = mysqli_query($conn, "select * from transaction where id_transaction = '$trans'");
              
                $data = mysqli_fetch_assoc($query);

               ?>
          </h3>
        </div>
        <!-- motoong dri sini -->
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Form Transaction</h4>
                    <p class="card-description"> Basic form update transaction </p>

                    <form class="forms-sample" action="proses-edit-transaksi.php?id_member=<?echo $data['id_member']?>" method="POST">
                    
                    <input type="hidden" name="id_tr" type="hidden" value="<?=$data['id_transaction']?>">
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
                        <label for="exampleInputName1">Date</label>
                        <input type="date" name="date" class="form-control" id="exampleInputDate1" placeholder="Date" value="<?= $data['date']; ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Deadline</label>
                        <input type="date" name="deadline" value="<?=$data['deadline']; ?>" class="form-control" id="exampleInputDeadline1" placeholder="Deadline">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Pay date</label>
                        <input value="<?=$data['pay_date']; ?>" type="date" name="paydate" class="form-control" id="exampleInputPassword1" placeholder="Pay Date">
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectStatus">Status</label>
                        <select class="form-control" name="status" value="<?=$data['status']; ?>" id="exampleSelectStatus">
                          <option value="new" <?php if($data['status']=='new')echo 'selected';?>>New</option>
                          <option value="in process" <?php if($data['status']=='in process')echo 'selected';?>>In proses</option>
                          <option value="done" <?php if($data['status']=='done')echo 'selected';?>>Done</option>
                          <option value="taken" <?php if($data['status']=='taken')echo 'selected';?>>Taken</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectRole">Paid</label>
                        <select class="form-control" name="bayar" value="<?=$data['status']; ?>" id="exampleSelectRole">
                          <!-- <option value="paid">Paid</option>
                          <option value="not yet paid">Not yet paid</option> -->
                          <?php
                                $arr_type = array(
                                'paid' => 'paid',
                                'not yet paid' => 'not yet paid',
                                );
                                        ?>
                                        <?php foreach($arr_type as $key => $value) :
                                            $sel = "";
                                            if($key == $data["bayar"]){
                                                $sel = 'selected';
                                            }
                                            echo "<option value='". $key ."' ".$sel.">" .$value ."</option>";  // displaying data in option menu
                                        ?>
                                        <?php endforeach ?>
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
