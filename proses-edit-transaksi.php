<?php
    include 'config/config.php';

    $id_member = $_POST['name'];
    $date = $_POST['date'];
    $deadline = $_POST['deadline'];
    $paydate = $_POST['paydate'];
    $status = $_POST['status'];
    $paid = $_POST['bayar'];
    $id_user = $_POST['username'];
    $id_tr = $_POST['id_tr'];

    // echo ($status);
    // var_dump($_POST["status"]); die();
    $up="UPDATE transaction SET 
                                id_member = '$id_member',
                                date = '$date',
                                deadline = '$deadline',
                                pay_date = '$paydate',
                                status = '$status',
                                paid = '$paid',
                                id_user = '$id_user'
                                WHERE id_transaction = '$id_tr'";
                                // var_dump($up); die();
    $error = mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
    $update = mysqli_query($conn, $up);
    if($update){
        // $tr_id = mysqli_insert_id($conn);
        // $queryDetail = "UPDATE 'detail_transaction' 
        // SET ('', '$tr_id', '$type', '$qty')";

        // $tr_detail_add = mysqli_query($conn, $queryDetail);
        echo"<script>
            alert('Success update data');
            document.location.href = 'tampil-transaksi.php';
            </script>";

        // if($tr_detail_add){
        //     echo"<script>
        //     alert('Success update data');
        //     document.location.href = 'tampil-transaksi.php';
        //     </script>";
        // } else{
        //     echo"<script>
        //     alert('failed update data');
        //     document.location.href = 'tampil-transaksi.php';
        //     </script>";
        // }
    } else{
        echo"<script>
        alert('Fail Update Data');
        document.location.href = 'tampil-transaksi.php';
        </script>";
    }
?>