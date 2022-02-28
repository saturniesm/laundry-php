<?php 
    if($_POST){

        //koneksi
        include '../config/config.php';
        session_start();


        //get data
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $role = $_POST["role"];

        //query
        $queryUsn = "SELECT username FROM user
                     WHERE username = '$username' ";
        $resultUsn = mysqli_query($conn, $queryUsn);
        $dataUsn = mysqli_num_rows($resultUsn);

        if($dataUsn > 0){
            echo 
                "<script>
                    alert('Username already taken, choose another username');
                    document.location.href = '../register.php';
                </script>";
            return false;
        }

        //check password
        if($password !== $cpassword){
            echo 
                "<script>
                    alert('Password and password confirmation are not matched, try again');
                    document.location.href = '../register.php';
                </script>";
            return false;
        }

        //enkripsi password
        $pass_encrypted = md5($password);

        //insert data
        $querySignUp = "INSERT INTO user VALUE ('', '$name', '$username', '$pass_encrypted', '$role') ";
        $insert = mysqli_query($conn, $querySignUp);

        if($insert){
            $_SESSION['role']         = $_POST['role'];
            $_SESSION['username']     = $_POST['username'];
            $_SESSION['login'] = true;
            echo 
                "<script>
                    alert('Registration success');
                    document.location.href = '../login.php';
                </script>";
        }else {
            echo    
                "<script>
                    alert('There is something wrong, try again');
                    document.location.href = '../register.php';
                </script>";
        }

        
    }
?>