<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];
        echo $password;
        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";

        } else {

            include '../config/config.php';

            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".md5($password)."'");

            if(mysqli_num_rows($qry_login)>0){

                $dt_login=mysqli_fetch_array($qry_login);

                session_start();
                $_SESSION['login']=true;
                $_SESSION['id_user']=$dt_login['id_user'];
                $_SESSION['username']=$dt_login['username'];
				$_SESSION['role']=$dt_login['role'];
                header("location: ../index.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='../login.php';</script>";

            }

        }
	}

    ?>