<?php
if($_POST){
    $id_member=$_POST['id_member'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $gender= $_POST['gender'];
    $tlp=$_POST['tlp'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='edit-member.php';</script>";
    } elseif(empty($address)){
        echo "<script>alert('address cannot be empty');location.href='edit-member.php';</script>";
    } elseif(empty($gender)){
        echo "<script>alert('gender cannot be empty');location.href='edit-member.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('tlp cannot be empty');location.href='edit-member.php';</script>";
    } else {
        include "config/config.php";
        $update=mysqli_query($conn,"update member set name='".$name."', address='".$address."', gender='".$gender."', tlp='".$tlp."' WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('successfully update member');location.href='tampil-member.php';</script>";
        } else {
            echo "<script>alert('failed to update member');location.href='tambah-member.php';</script>";
        }
    }
}
?>