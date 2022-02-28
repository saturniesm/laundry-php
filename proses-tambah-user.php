<?php
if($_POST){
    // var_dump($_POST["password"]); die();
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $role=$_POST['role'];

    if(empty($name)){
        echo "<script>alert('name cannot be empty');location.href='tambah-user.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username cannot be empty');location.href='tambah-user.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password cannot be empty');location.href='tambah-user.php';</script>";
    } elseif(empty($role)){
        echo "<script>alert('role cannot be empty');location.href='tambah-user.php';</script>";
    } else {
        
        include "config/config.php";
        $insert = mysqli_query($conn, "insert into user (nama, username, password, role) value ('".$name."', '".$username."', '".md5($password)."', '".$role."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('successfully add user');location.href='tampil-user.php';</script>";
        } else {
            echo "<script>alert('failed to add user');location.href='tambah-user.php';</script>";
        }
    }
}
?>