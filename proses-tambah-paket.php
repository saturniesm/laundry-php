<?php
if($_POST){
    $type=$_POST['type'];
    $price=$_POST['price'];
    if(empty($type)){
        // echo "<script>alert('type cannot be empty');location.href='tambah-paket.php';</script>";
    } elseif(empty($price)){
        echo "<script>alert('price cannot be empty');location.href='tambah-paket.php';</script>";
    } else {
        include "config/config.php";
        $insert=mysqli_query($conn,"insert into package (type, price) value ('".$type."','".$price."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('successfully add package');location.href='tampil-paket.php';</script>";
        } else {
            echo "<script>alert('failed to add package');location.href='tambah-paket.php';</script>";
        }
    }
}
?>