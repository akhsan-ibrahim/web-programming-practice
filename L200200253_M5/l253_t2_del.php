<?php 
    $conn = mysqli_connect('localhost','root','','toko');
    $kode = $_GET['KodeGudang'];
    $query = "DELETE FROM gudang WHERE kode_gudang = '$kode'";
    mysqli_query($conn, $query);
    header('Location: l253_t2_view.php');
    exit();
?>