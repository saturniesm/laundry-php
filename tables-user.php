<?php
include "../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Tables  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Table</h4>
                    <p class="card-description"> sembarang wes bingung isine</p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> NAME </th>
                          <th> USERNAME </th>
                          <th> ROLE </th>
                          <th> ACTION </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          include "../../config.php";
                          $qry_user=mysqli_query($conn, "select * from user");
                          $no=0;
                          while($data=mysqli_fetch_array($qry_user)){
                            $no++
                            ?>
                            <tr>
                              <td><?=$data['id_user']?></td>
                              <td><?=$data['name']?></td>
                              <td><?=$data['username']?></td>
                              <td><?=$data['role']?></td>

                              <td>
                              <a href="../forms/update-from-user.php?id_user=<?php echo $data['id_user']?>"><button class="btn btn-primary px-2">Edit</button></a>
                              <a href="hapus_user.php?id_user=<?php echo $data['id_user']?>"><button class="btn btn-danger px-2" onclick="return confirm('Are you sure to delete the data from user <?php echo $data['nama_user'] . '?'?>')">Delete</button></a>
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
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>