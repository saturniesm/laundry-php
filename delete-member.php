<?php
    include 'config/config.php';
    $id_member = $_GET['id_member'];
    //jumlah 4
    $sql = "DELETE FROM member WHERE id_member = " . $id_member. "";
    $error = mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        echo "<script>alert('Sukses hapus member'); location.href='tampil-member.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus member'); location.href='tampil-member.php';</script>";
    }
?>