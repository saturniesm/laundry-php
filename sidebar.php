
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-text">
            <?php
            if (isset($_SESSION['username'])) {
              echo '<p class="mb-1 text-black">Halo ' . $_SESSION["role"] .' '. $_SESSION["username"] . '</p>';
            }
            ?>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <?php
          if(isset($_SESSION['login'])){
            echo 
            '<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="proses/logout.php">
              <i class="mdi mdi-logout mr-2 text-primary"></i> Logout </a>';
          } else{
            echo 
            '<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php">
            <i class="mdi mdi-cached mr-2 text-success"></i> Login </a>';
          }
          ?>
      </li>
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count-symbol bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
          aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Notifications Pembelian</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-calendar"></i>
              </div>
            </div>
            <!--                            ini nanti nampilin user siapa yang paling baru melakukan penjualan-->
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
              <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="mdi mdi-settings"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
              <p class="text-gray ellipsis mb-0"> Update dashboard </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="mdi mdi-link-variant"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
              <p class="text-gray ellipsis mb-0"> New admin wow! </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">See all notifications</h6>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="index.php" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
            <?php
              if (isset($_SESSION['status_login'])) {
                echo '<span class="font-weight-bold mb-2">' . $_SESSION["username"] . '</span>';
            }
            ?>
            <span class="text-secondary text-small">
            <?php
            if (isset($_SESSION['status_login'])) {
              echo $_SESSION["role"];
              echo ' Express Laundry';
            }
            ?>
            </span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <?php
          if($_SESSION['role'] == 'admin'){
          ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Kelola User</span>
          <i class="menu-arrow"></i>
          <i class=" mdi mdi-account menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="tampil-user.php">Tampil User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah-user.php">Tambah User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Kelola Member</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="tampil-member.php">Tampil Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah-member.php">Tambah Member</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Kelola Paket</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-package menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="tampil-paket.php">Tampil Paket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah-paket.php">Tambah Paket</a>
            </li>
          </ul>
        </div>
      </li>
      <?php
          }  ?>
      <li class="nav-item">
        <a class="nav-link" href="tampil-transaksi.php">
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-weight menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tambah-transaksi.php">
          <span class="menu-title">Tambah Transaksi</span>
          <i class="mdi mdi-file-find menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
