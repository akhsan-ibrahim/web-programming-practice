<html>
<head><title>Data Jenis Buku</title></head>
<?php
    //Koneksi ke database "perpustakaan"
    $conn = mysqli_connect('localhost','root','','perpustakaan');
    //Mengambil data jenis buku 
    if(isset($_GET['kode_jenis'])){
        $kode = $_GET['kode_jenis'];
        $query = "SELECT * FROM jenis_buku WHERE kode_jenis='$kode'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }
?>
<body>
    <center>
        <h3>Data Jenis Buku :</h3>
        <table border="0" width='30%'>
            <form action="l253_t1_jenis.php" method="post">
                <tr>
                    <td width='25%'>Kode Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="kode_jenis" size="10" value="<?php echo(isset($data) ? $data['kode_jenis'] : '')?>" required></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="nama_jenis" size="30"  value="<?php echo(isset($data) ? $data['nama_jenis'] : '')?>" required></td>
                </tr>                
                <tr>
                    <td width='25%'>Keterangan</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="keterangan_jenis" size="30"  value="<?php echo(isset($data) ? $data['keterangan_jenis'] : '')?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Masukkan"></td>
                </tr>
            </form>
        </table>
        <?php        
            if(isset($_POST['submit'])){
                $kode_jenis = $_POST['kode_jenis'];
                $nama_jenis = $_POST['nama_jenis'];
                $keterangan_jenis = $_POST['keterangan_jenis'];
                $query = "SELECT 'kode_jenis' FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
                $result = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($result);
                if($data){
                // ------------- UPDATE ------------
                    $query = "UPDATE jenis_buku SET kode_jenis = '$kode_jenis', nama_jenis = '$nama_jenis', keterangan_jenis = '$keterangan_jenis' WHERE kode_jenis = '$kode_jenis'";
                    $result = mysqli_query($conn, $query);
                    echo'Data berhasil diperbarui';
                }else{
                // ------------- INSERT ------------
                    $input = "INSERT INTO jenis_buku (kode_jenis, nama_jenis, keterangan_jenis) VALUES ('$kode_jenis', '$nama_jenis', '$keterangan_jenis')";
                    mysqli_query($conn,$input);
                    echo'Data berhasil ditambahkan';
                }                        
            }
		?>
        <hr>
        <h3>Daftar Jenis Buku Perpustakaan</h3>
        <table border="1" width="50%">
            <tr>
                <td align='center' width='20%'><b>Kode Jenis</b></td>
                <td align='center' width='30%'><b>Nama Jenis</b></td>
                <td align='center' width='30%'><b>Keterangan</b></td>
                <td align='center' width='10%'><b>Edit</b></td>
                <td align='center' width='10%'><b>Hapus</b></td>
            </tr>
            <?php
            // ------------- VIEW ------------
                $cari = "SELECT * FROM jenis_buku";
                $result = mysqli_query($conn, $cari);
                while($data = mysqli_fetch_row($result)){
                    echo "
                    <tr>
                        <td width='20%'>$data[0]</td>
                        <td width='30%'>$data[1]</td>
                        <td width='30%'>$data[2]</td>
                        <td align='center' width='10%'><a href='l253_t1_jenis.php?kode_jenis=$data[0]'>Edit</a></td>
                        <td align='center' width='10%'><a href='l253_t1_del_jenis.php?kode_jenis=$data[0]'>Hapus</a></td>
                    </tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>