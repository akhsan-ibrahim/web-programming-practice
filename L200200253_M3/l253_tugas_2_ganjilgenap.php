<html>
<head><title>L200200253 Ganjil/Genap</title></head>
<body>
    <h2>Ganjil atau Genap?</h2>
    <form action="l253_tugas_2_ganjilgenap.php" method="post">
        Masukkan bilangan : <input type="text" name="bilangan" size="3"></br>
        <input type="submit" value="Cek" name="cek">
    </form>
    <?php 
        error_reporting(E_ALL & E_NOTICE);
        $bilangan = $_POST['bilangan'];
        $cek = $_POST['cek'];
        if ($cek) {
            if ($bilangan % 2 == 0) {
                $hasil = "genap";
            } else {
                $hasil = "ganjil";
            }
            echo "Bilangan $bilangan merupakan bilangan $hasil.";
        }
    ?>
</body>
</html>