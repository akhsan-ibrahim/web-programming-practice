<?php 
// --------------- DELETE ------------------------
    $conn = mysqli_connect('localhost','root','','perpustakaan');
    $kode = $_GET['kode_jenis'];
    $query = "DELETE FROM jenis_buku WHERE kode_jenis = '$kode'";
    mysqli_query($conn, $query);
    //Redirect ke laman l253_t1_buku.php
    header('Location: l253_t1_jenis.php');
    exit();
?>