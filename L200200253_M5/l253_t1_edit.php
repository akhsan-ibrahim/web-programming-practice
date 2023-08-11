<html>
<head><title>Ubah Data Mahasiswa</title></head>
<?php
    $conn = mysqli_connect('localhost','root','','informatika');
?>
<body>
<?php
    error_reporting(E_ALL & E_NOTICE);
    $nim = $_GET['NIM'];
    $show = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
    $result = mysqli_query($conn,$show);
    $data = mysqli_fetch_assoc($result);

    if ($data) {        
?>
    <center>
    <h3>Ubah Data Mahasiswa :</h3>
    <table border="0" width='30%'>
        <form action="l253_t1_upd.php" method="post">
            <tr>
                <td width='25%'>NIM</td>
                <td width='5%'>:</td>
                <td width='65%'><input type="text" name="nim" size="10" value="<?php echo $data['NIM']; ?>"></td>
            </tr>
            <tr>
                <td width='25%'>Nama</td>
                <td width='5%'>:</td>
                <td width='65%'><input type="text" name="nama" size="30" value="<?php echo $data['Nama']; ?>"></td>
            </tr>
            <tr>
                <td width='25%'>Kelas</td>
                <td width='5%'>:</td>
                <td width='65%'>
                    <input type="radio" name="kelas" value="A" <?php echo ($data['Kelas']=='A') ? 'checked' : ''; ?>>A
                    <input type="radio" name="kelas" value="B" <?php echo ($data['Kelas']=='B') ? 'checked' : ''; ?>>B
                    <input type="radio" name="kelas" value="C" <?php echo ($data['Kelas']=='C') ? 'checked' : ''; ?>>C
                    <input type="radio" name="kelas" value="D" <?php echo ($data['Kelas']=='D') ? 'checked' : ''; ?>>D
                    <input type="radio" name="kelas" value="E" <?php echo ($data['Kelas']=='E') ? 'checked' : ''; ?>>E
                </td>
            </tr>
            <tr>
                <td width='25%'>Alamat</td>
                <td width='5%'>:</td>
                <td width='65%'><input type="text" name="alamat" size="40" value="<?php echo $data['Alamat']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Masukkan"></td>
            </tr>
        
        </form>
    </table>
<?php
    }
    else {
        echo "Data tidak ditemukan";
    }
?>
    <!-- <hr>
    <table border="1" width="50%">
        <tr>
            <td align='center' width='20%'><b>NIM</b></td>
            <td align='center' width='30%'><b>Nama</b></td>
            <td align='center' width='10%'><b>Kelas</b></td>
            <td align='center' width='30%'><b>Alamat</b></td>
            <td align='center' width='10%'><b>Opsi</b></td>
        </tr>
        <?php
            $cari = "SELECT * FROM mahasiswa ORDER BY NIM;";
            $hasil_cari = mysqli_query($conn,$cari);
            while ($data=mysqli_fetch_row($hasil_cari)) {
                echo "
                <tr>
                    <td align='center' width='20%'>$data[0]</td>
                    <td align='center' width='30%'>$data[1]</td>
                    <td align='center' width='10%'>$data[2]</td>
                    <td align='center' width='30%'>$data[3]</td>
                    <td align='center' width='10%'><a href='l253_t1_edit.php?NIM=$data[0]'></a></td>
                </tr>
                ";
            }
        ?>
    </table> -->
    </center>    
</body>
</html>