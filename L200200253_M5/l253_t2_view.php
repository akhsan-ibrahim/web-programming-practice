<html>
<head><title>Data Gudang</title></head>
<?php
    $conn = mysqli_connect('localhost','root','','toko');
    if(isset($_GET['KodeGudang'])){
        $kode = $_GET['KodeGudang'];
        $query = "SELECT * FROM gudang WHERE kode_gudang='$kode'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }
?>
<body>
    <center>
        <h3>Data Gudang</h3>
        <table border="0" width='30%'>
            <form action="l253_t2_view.php" method="post">
                <tr>
                    <td width='15%'>Kode</td>
                    <td width='5%'>:</td>
                    <td width='80%'><input type="text" required name='kode_gudang' size='10' value="<?php echo(isset($data) ? $data['kode_gudang'] : '')?>"></td>
                </tr>
                <tr>
                    <td width='15%'>Nama</td>
                    <td width='5%'>:</td>
                    <td width='80%'><input type="text" required name='nama_gudang' size='30' value="<?php echo(isset($data) ? $data['nama_gudang'] : '')?>"></td>
                </tr>
                <tr>
                    <td width='15%'>Lokasi</td>
                    <td width='5%'>:</td>
                    <td width='80%'><textarea name="lokasi" required cols="30" rows="5"><?php echo(isset($data) ? $data['lokasi'] : '')?></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Masukkan"></td>
                </tr>
            <?php
                if(isset($_POST['submit'])){
                    $kode = $_POST['kode_gudang'];
                    $nama = $_POST['nama_gudang'];
                    $lokasi = $_POST['lokasi'];
                    $query = "SELECT 'kode' FROM gudang WHERE kode_gudang='$kode'";
                    $result = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($result);
                    if($data){
                        $query = "UPDATE gudang SET kode_gudang = '$kode', nama_gudang = '$nama', lokasi = '$lokasi' WHERE kode_gudang = '$kode'";
                        $result = mysqli_query($conn, $query);
                        echo'Data berhasil diperbarui';
                    }else{
                        $input = "INSERT INTO `gudang` (`kode_gudang`, `nama_gudang`, `lokasi`) VALUES ('$kode','$nama','$lokasi')";
                        mysqli_query($conn,$input);
                        echo'Data berhasil ditambahkan';
                    }                        
                }
            ?>
            </form>
        </table>
        <hr>
        <table border="1" width="50%">
            <tr>
                <td align='center' width='20%'><b>Kode</b></td>
                <td align='center' width='30%'><b>Nama</b></td>
                <td align='center' width='30%'><b>Lokasi</b></td>
                <td align='center' width='10%'><b>Edit</b></td>
                <td align='center' width='10%'><b>Hapus</b></td>
            </tr>
            <?php
                $cari = "SELECT * FROM gudang";
                $hasil_cari = mysqli_query($conn,$cari);
                while ($data=mysqli_fetch_row($hasil_cari)) {
                    echo "
                    <tr>
                        <td align='center' width='20%'>$data[0]</td>
                        <td align='center' width='30%'>$data[1]</td>
                        <td align='center' width='30%'>$data[2]</td>
                        <td align='center' width='10%'><a href='l253_t2_view.php?KodeGudang=$data[0]'>Edit</a></td>
                        <td align='center' width='10%'><a href='l253_t2_del.php?KodeGudang=$data[0]'>Hapus</a></td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </center>    
</body>
</html>