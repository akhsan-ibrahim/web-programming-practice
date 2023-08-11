<?php 
// --------------- DELETE ------------------------
    $conn = mysqli_connect('localhost','root','','perpustakaan');
    $kode = $_GET['kode_buku'];
    $query = "DELETE FROM buku WHERE kode_buku = '$kode'";
    mysqli_query($conn, $query);
    //Redirect ke laman l253_t1_buku.php
    header('Location: l253_t1_buku.php');
    exit();
?>