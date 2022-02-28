<?php
if($_POST){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $role=$_POST['role'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='update-form-user.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username canot be empty');location.href='update-form-user.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password cannot be empty');location.href='update-form-user.php';</script>";
    } else {
        include "config.php";
        $update=mysqli_query($conn,"update into user set name, username, password, role) value ('".$name."','".$username."','".md5($password)."','".$role."')") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('succesfully update user');location.href='tables/tables-user.php';</script>";
        } else {
            echo "<script>alert('failed update user');location.href='form-user.php';</script>";
        }
    }
}
?>