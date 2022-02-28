<?php 
    include 'config/config.php';
    
    $id_member=$_POST['name'];
    $date=$_POST['date'];
    $deadline=$_POST['deadline'];
    $paydate=$_POST['paydate'];
    $status=$_POST['status'];
    $paid=$_POST['bayar'];
    $id_user=$_POST['username'];
    $id_tr=$_POST['id_tr'];
    
    $update=mysqli_query($conn, "UPDATE `transaction` SET
                                `id_member`='$id_member',
                                `date`='$date',
                                `deadline`='$deadline',
                                `pay_date`='$paydate',
                                `status`='$status',
                                `paid`='$paid',
                                `id_user`='$id_user' 
                                 WHERE `id_transaction`='$id_tr' ") 
                                 or die(mysqli_error($conn));

    // $update = "UPDATE `transaction` SET (`id_transaction`, `id_member`, `date`, `deadline`, `pay_date`, `status`, `paid`, `id_user`) VALUES ('', '$petugas', '$date', '$deadline', '$paydate', '$status', '$paid', '$id_user') ";
    $up = mysqli_query($conn, $update);
    // var_dump($tambah); die();
    //cek
    if($up){
        $tr_id = mysqli_insert_id($conn);
        $queryDetail = "UPDATE `detail_transaction`
        SET ('','$tr_id', '$type', '$qty')";

        $tr_detail_add = mysqli_query($conn, $queryDetail);

        if($tr_detail_add){
            echo"
            <script>
                alert('Succes update data');
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
        // echo "
        // <script>
        //     alert('Failed to add data');
        //     document.location.href = 'tambah-transaksi.php';
        // </script>
        // ";
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