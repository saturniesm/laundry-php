<?php
if($_POST){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $role=$_POST['role'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='form-user.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username cannot be empty');location.href='form-user.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password cannot be empty');location.href='form-user.php';</script>";
    } else {
        include "config.php";
        $insert=mysqli_query($conn,"insert into user (name, username, password, role) value ('".$name."','".$username."','".md5($password)."','".$role."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('successfully added user');location.href='tables-user.php';</script>";
        } else {
            echo "<script>alert('failed to add user');location.href='form-user.php';</script>";
        }
    }
}
?>