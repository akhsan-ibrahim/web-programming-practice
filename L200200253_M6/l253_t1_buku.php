<html>
<head><title>Data Buku</title></head>
<?php
    //Koneksi ke database "perpustakaan"
    $conn = mysqli_connect('localhost','root','','perpustakaan');
    //Mengambil data buku 
    if(isset($_GET['kode_buku'])){
        $kode = $_GET['kode_buku'];
        $query = "SELECT * FROM buku WHERE kode_buku='$kode'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }
?>
<body>
    <center>
        <h3>Data Buku :</h3>
        <table border="0" width='30%'>
            <form action="l253_t1_buku.php" method="post">
                <tr>
                    <td width='25%'>Kode Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="kode_buku" size="10" value="<?php echo(isset($data) ? $data['kode_buku'] : '')?>" required></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="nama_buku" size="30"  value="<?php echo(isset($data) ? $data['nama_buku'] : '')?>" required></td>
                </tr>                
                <tr>
                    <td width='25%'>Jenis Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <select name="kode_jenis">
                            <?php
                                //Menampilkan list jenis buku dari tabel "jenis_buku"
                                $kode_jenisFK = isset($data) ? $data['kode_jenisFK'] : '';
                                $sql = "SELECT * FROM jenis_buku";
                                $retval = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($retval)){
                                    echo "<option value ='$row[kode_jenis]'" , ($row['kode_jenis']==$kode_jenisFK) ? 'selected' : '' , ">$row[nama_jenis]</option>";
                                }
                            ?>
                        </select>
                        <a href='l253_t1_jenis.php' target="_blank">Selengkapnya</a>
                    </td>
                </tr>
                <tr>                    
                    <td><input type="submit" name="submit" value="Masukkan"></td>
                    <td></td>
                    <td><input type="hidden" name="kode_buku" value="<?php echo(isset($data) ? $data['kode_buku'] : '')?>"></td>
                </tr>
            </form>
        </table>
        <?php        
            if(isset($_POST['submit'])){
                $kode_buku = $_POST['kode_buku'];
                $nama_buku = $_POST['nama_buku'];
                $kode_jenis = $_POST['kode_jenis'];
                $query = "SELECT 'kode_buku' FROM buku WHERE kode_buku='$kode_buku'";
                $result = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($result);
                if($data){
                // ------------- UPDATE ------------
                    $query = "UPDATE buku SET kode_buku = '$kode_buku', nama_buku = '$nama_buku', kode_jenisFK = '$kode_jenis' WHERE kode_buku = '$kode_buku'";
                    $result = mysqli_query($conn, $query);
                    echo'Data berhasil diperbarui';
                }else{
                // ------------- INSERT ------------
                    $input = "INSERT INTO buku (kode_buku, nama_buku, kode_jenisFK) VALUES ('$kode_buku', '$nama_buku', '$kode_jenis')";
                    mysqli_query($conn,$input);
                    echo'Data berhasil ditambahkan';
                }                        
            }
		?>
        <hr>
        <h3>Daftar Buku Perpustakaan</h3>
        <table border="1" width="50%">
            <tr>
                <td align='center' width='20%'><b>Kode Buku</b></td>
                <td align='center' width='30%'><b>Nama Buku</b></td>
                <td align='center' width='30%'><b>Jenis Buku</b></td>
                <td align='center' width='10%'><b>Edit</b></td>
                <td align='center' width='10%'><b>Hapus</b></td>
            </tr>
            <?php
            // ------------- VIEW ------------
                $cari = "SELECT * FROM buku, jenis_buku where buku.kode_jenisFK = jenis_buku.kode_jenis";
                $result = mysqli_query($conn, $cari);
                while($data = mysqli_fetch_row($result)){
                    echo "
                    <tr>
                        <td width='20%'>$data[0]</td>
                        <td width='30%'>$data[1]</td>
                        <td width='30%'>$data[4]</td>
                        <td align='center' width='10%'><a href='l253_t1_buku.php?kode_buku=$data[0]'>Edit</a></td>
                        <td align='center' width='10%'><a href='l253_t1_del_buku.php?kode_buku=$data[0]'>Hapus</a></td>
                    </tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>