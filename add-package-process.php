<?php
if($_POST){
    $type=$_POST['type'];
    $price=$_POST['price'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='form-member.php';</script>";
    } elseif(empty($address)){
        echo "<script>alert('address cannot be empty');location.href='form-member.php';</script>";
    } elseif(empty($gender)){
        echo "<script>alert('gender cannot be empty');location.href='form-member.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('tlp cannot be empty');location.href='form-member.php';</script>";
    } else {
        include "config.php";
        $insert=mysqli_query($conn,"insert into package (name, address, gender, tlp) value ('".$name."','".$address."','".$gender."','".$tlp."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('successfully add member');location.href='tables-member.php';</script>";
        } else {
            echo "<script>alert('failed to add member');location.href='form-member.php';</script>";
        }
    }
}
?>