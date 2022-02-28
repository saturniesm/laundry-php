<?php
$conn = mysqli_connect('localhost', 'root', '', 'ukl_laundry');
if (mysqli_connect_errno()) {
    printf("Connect failed: %\n", mysqli_connect_error());
    exit();
}
?>