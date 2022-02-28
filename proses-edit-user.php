<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $role=$_POST['role'];
    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='edit-user.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username cannot be empty');location.href='edit-user.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password cannot be empty');location.href='edit-user.php';</script>";
    } elseif(empty($role)){
        echo "<script>alert('role cannot be empty');location.href='edit-user.php';</script>";
    } else {
        include "config/config.php";
        $update=mysqli_query($conn,"update user set nama='".$name."', username='".$username."', password='".md5($password)."', role='".$role."' WHERE id_user='".$id_user."'") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('successfully update user');location.href='tampil-user.php';</script>";
        } else {
            echo "<script>alert('failed to update user');location.href='tambah-user.php';</script>";
        }
    }
}
?>