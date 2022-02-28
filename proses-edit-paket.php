<?php
if($_POST){
    $id_package=$_POST['id_package'];
    $type=$_POST['type'];
    $price=$_POST['price'];
    if(empty($type)){
        echo "<script>alert('type cannot be empty');location.href='edit-paket.php';</script>";
    } elseif(empty($price)){
        echo "<script>alert('price cannot be empty');location.href='edit-paket.php';</script>";
    } else {
        include "config/config.php";
        $update=mysqli_query($conn,"update package set type='".$type."', price='".$price."' WHERE id_package='".$id_package."'") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('successfully update package');location.href='tampil-paket.php';</script>";
        } else {
            echo "<script>alert('failed to update package');location.href='tambah-paket.php';</script>";
        }
    }
}
?>