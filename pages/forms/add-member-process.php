<?php
if($_POST){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $gender= $_POST['gender'];
    $tlp=$_POST['tlp'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='../../tambah-member.php';</script>";
    } elseif(empty($address)){
        echo "<script>alert('address cannot be empty');location.href='../../tambah-member.php';</script>";
    } elseif(empty($gender)){
        echo "<script>alert('gender cannot be empty');location.href='../../tambah-member.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('tlp cannot be empty');location.href='../../tambah-member.php';</script>";
    } else {
        include "config.php";
        $insert=mysqli_query($conn,"insert into member (name, address, gender, tlp) value ('".$name."','".$address."','".$gender."','".$tlp."')") or die(mysqli_error($conn));
        if($insert){
            // echo "<script>alert('successfully add member');location.href='../../tampil-member.php';</script>";
            printf(msqli_eror($conn));
        } else {
            // echo "<script>alert('failed to add member');location.href='../../tambah-member.php';</script>";
            printf(msqli_eror($conn));
        }
    }
}
?>