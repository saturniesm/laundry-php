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

                include 'config/config.php';

                //get data
                $trans = $_GET['id_transaction'];
                $query = mysqli_query($conn, "select * from transaction where id_transaction = '$trans'");
              
                $data = mysqli_fetch_assoc($query);
                // var_dump($data);

                // include "config/config.php";  // Using database connection file here
                $recordsUser = mysqli_query($conn, "SELECT * FROM user");  // Use select query here
                // var_dump(mysqli_fetch_assoc($recordsUser)); die();

                // $id_tr = $_GET["id_transaction"];

                // $query = "SELECT * FROM transaction
                //           WHERE id_transaction = '$id_tr' ";
                // $datas = mysqli_query($conn, $query);
                // $data = mysqli_fetch_assoc($datas);
                // var_dump($data); die();
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
                      
                      <select name="name" value="<?=$data['name']?>" class="form-control">
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
                      <!-- ini punya siapa -->
                      <div class="form-group">
                      <label for="exampleInputName1">Type Package</label>
                      <select name="type" class="form-control">
                        
                         <option></option>
                            <?php
                            include "config/config.php";  // Using database connection file here
                            $data = mysqli_query($conn, "select * from member where id_user = '".$_GET['id_user']."' join member where id_member = '".$_GET['id_member']."' join transaction where = '".$_GET['id_transaction']."' ");
                            $dta = mysqli_fetch_assoc($data);

                            $qry_package=mysqli_query($conn, "select * from package");
                            while($data_package=mysqli_fetch_array($qry_package)){
                              echo '<option value="'.$data_package['id_package'].'">'.$data_package['type'].'</option>';
                            }
                            ?>
                      </select>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id_transaction" value="<?=$_GET['id_transaction']?>">
                        <input type="hidden" name="id_user" value="<?=$_GET['id_user']?>">
                        <input type="hidden" name="id_member" value="<?=$_GET['id_member']?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date</label>
                        <input type="date" name="date" class="form-control" id="exampleInputDate1" placeholder="Date" value="<?=$data['date']?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Deadline</label>
                        <input type="date" name="deadline" value="<?=$data['deadline']?>" class="form-control" id="exampleInputDeadline1" placeholder="Deadline">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Pay date</label>
                        <input type="date" name="paydate" value="<?=$data['paydate']?>" class="form-control" id="exampleInputPassword1" placeholder="Pay Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectStatus">Status</label>
                        <select class="form-control" name="status" value="<?=$data['status']?>" id="exampleSelectStatus">
                          <option value="new">New</option>
                          <option value="in proses">In proses</option>
                          <option value="done">Done</option>
                          <option value="taken">Taken</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectRole">Paid</label>
                        <select class="form-control" name="bayar" value="<?=$data['status']?>" id="exampleSelectRole">
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
                            // include "config/config.php";  // Using database connection file here
                            // $records = mysqli_query($conn, "SELECT * FROM user");  // Use select query here 
                            // $user = mysqli_fetch_array($records);
                            // while($user)
                            // {
                            //     $selected = "";
                            // if($member['id_user'] == $data['id_user']){
                            //     $selected = 'selected';
                            // }
                            // echo "<option value='". $user['id_user'] ."' ".$selected.">" .$user['name'] ."</option>";  // displaying data in option menu

                            // }
                            include "config/config.php";  // Using database connection file here
                            $records = mysqli_query($conn, "SELECT * FROM user");  // Use select query here 
                            while($member = mysqli_fetch_array($records))
                            {
                                $selected = "";
                            if($member['id_user'] == $data['id_user']){
                                $selected = 'selected';
                            }
                                echo "<option value='". $member['id_user'] ."' ".$selected.">" .$member['name'] ."</option>";  // displaying data in option menu
                            }	?>	
                            ?>
                            
                            </select>
                            </div>
                            
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
