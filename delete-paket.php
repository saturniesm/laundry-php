<?php
    include 'config/config.php';
    $id_package = $_GET['id_package'];
    //jumlah 4
    $sql = "delete from package where id_package = " . $id_package. ";";
    //menghapus berapapun kondisi sesuai yg ada pada 
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        echo "<script>alert('Sukses hapus paket'); location.href='tampil-paket.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus paket'); location.href='tampil-paket.php';</script>";
    }
?>