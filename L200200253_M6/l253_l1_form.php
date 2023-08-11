<html>
<head><title>Data Barang</title></head>
<?php
    //Koneksi ke database "toko"
    $conn = mysqli_connect('localhost','root','','toko');
?>
<body>
    <center>
        <h3>Masukkan Data Barang :</h3>
        <table border="0" width='30%'>
            <form action="l253_l1_form.php" method="post">
                <tr>
                    <td width='25%'>Kode Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="kode_barang" size="10"></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name="nama_barang" size="30"></td>
                </tr>                
                <tr>
                    <td width='25%'>Gudang</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <select name="kode_gudang">
                            <?php
                                //Menampilkan list nama gudang dari tabel "gudang"
                                $sql = "SELECT * FROM gudang";
                                $retval = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($retval)){
                                    echo "<option value ='$row[kode_gudang]'>$row[nama_gudang]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <td><input type="submit" name="submit" value="Masukkan"></td>                    
                </tr>
            </form>
        </table>
        <?php
            //Menambahkan record data barang
            error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kode_gudang = $_POST['kode_gudang'];
            $submit = $_POST['submit'];
            $input = "INSERT INTO barang (kode_barang, nama_barang, kode_gudangFK) VALUES ('$kode_barang', '$nama_barang', '$kode_gudang')";
            if ($submit){
                mysqli_query($conn, $input);
                echo "</br>Data berhasil dimasukkan";
            }
		?>
        <hr>
        <h3>Data Barang</h3>
        <table border="1" width="50%">
            <tr>
                <td align='center' width='20%'><b>Kode Barang</b></td>
                <td align='center' width='30%'><b>Nama Barang</b></td>
                <td align='center' width='30%'><b>Gudang</b></td>
            </tr>
            <?php
                //Menampilkan list barang dan gudang penyimpanannya
                $cari = "SELECT * FROM barang, gudang where barang.kode_gudangFK = gudang.kode_gudang";
                $result = mysqli_query($conn, $cari);
                while($data = mysqli_fetch_row($result)){
                    echo "
                    <tr>
                        <td width='20%'>$data[0]</td>
                        <td width='30%'>$data[1]</td>
                        <td width='30%'>$data[5]</td>
                    </tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>