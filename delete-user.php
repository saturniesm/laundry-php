<?php
    include 'config/config.php';
    $id_user = $_GET['id_user'];
    //jumlah 4
    $sql = "delete from user where id_user = " . $id_user. ";";
    //menghapus berapapun kondisi sesuai yg ada pada 
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        echo "<script>alert('Sukses hapus user'); location.href='tampil-user.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus user'); location.href='tampil-user.php';</script>";
    }
?>