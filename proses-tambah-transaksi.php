<?php 
    include 'config/config.php';
    
    $petugas=$_POST['name'];
    $type=$_POST['type'];
    $qty=$_POST['qty'];
    $date=$_POST['date'];
    $deadline=$_POST['deadline'];
    $paydate=$_POST['paydate'];
    $status=$_POST['status'];
    $paid=$_POST['bayar'];
    $id_user=$_POST['username'];
    // $id_transaction=$_POST['id_transaction'];
    // $id_member = $_POST['id_member'];
    // $id_user = $_POST['id_user'];

    // $add = mysqli_query($conn, "insert into transaction (id_transaction, id_member, date, deadline, pay_date, status, paid, id_user) values (null, null, '".$date."', '".$deadline."', '".$paydate."', '".$status."', '".$petugas."')");

    // $query = "INSERT INTO transaction VALUES (NULL, '$id_member', '$type', '$qty', '$date', '$deadline', '$paydate', '$status', '$name_user')";
    // $add = mysqli_query($conn, $query);

    $add = "INSERT INTO `transaction` (`id_transaction`, `id_member`, `date`, `deadline`, `pay_date`, `status`, `paid`, `id_user`) VALUES ('', '$petugas', '$date', '$deadline', '$paydate', '$status', '$paid', '$id_user') ";
    $tambah = mysqli_query($conn, $add);
    // var_dump($tambah); die();
    //cek
    if($tambah){
        $tr_id = mysqli_insert_id($conn);
        $queryDetail = "INSERT INTO `detail_transaction`
        VALUES ('','$tr_id', '$type', '$qty')";

        $tr_detail_add = mysqli_query($conn, $queryDetail);

        if($tr_detail_add){
            echo"
            <script>
                alert('Succes add data');
                document.location.href = 'tampil-transaksi.php';
            </script>
            ";
            // printf(mysqli_error($conn));
        } else{
            echo"
            <script>
                alert('Failed add data');
                document.location.href = 'tampil-transaksi.php';
            </script>
            ";
            printf(mysqli_error($conn));
        }
    }else{
        echo "
        <script>
            alert('Failed to add data');
            document.location.href = 'tambah-transaksi.php';
        </script>
        ";
        printf(mysqli_error($conn));
    }


// $result = mysqli_query($conn, $sql);
// if($result){
//     echo "<script>alert('Success add transaction');location.href='tambah_transaksi.php';</script>";
// }else{
//     // echo "<script>alert('Failed add transaction');location.href='tambah_transaksi.php';</script>";
//     printf(mysqli_error($conn));
// }
// ?>