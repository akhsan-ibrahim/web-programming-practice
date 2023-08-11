<?php
    $conn = mysqli_connect('localhost','root','','informatika');

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE mahasiswa SET nama='$nama',kelas='$kelas',alamat='$alamat' WHERE NIM='$nim'";
    $result = mysqli_query($conn,$update);

    if ($result) {
        header('Location:l253_t1_form.php');
        exit();
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>