<?php
if($_POST){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $gender= $_POST['gender'];
    $tlp=$_POST['tlp'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='update-form-member.php';</script>";
    } elseif(empty($address)){
        echo "<script>alert('address canot be empty');location.href='update-form-member.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('tlp cannot be empty');location.href='update-form-member.php';</script>";
    } else {
        include "config.php";
        $update=mysqli_query($conn,"update into member set name, address, gender, tlp) value ('".$name."','".$address."','".$gender."','".$tlp."')") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('succesfully update member');location.href='tampil-member.php';</script>";
        } else {
            echo "<script>alert('failed update member');location.href='tambah-member.php';</script>";
        }
    }
}
?>