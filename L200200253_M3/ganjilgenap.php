<html>
<head>
    <title>Bilangan Ganjil Genap</title>
</head>
<body>
    <h2>Cek Bilangan</h2>
    <form action="" method="post">
        Masukkan bilangan : <input type="text" name="bilgn">
        <input type="submit" value="Cek" name="submit">
    </form>
    <?php 
        error_reporting(E_ALL & E_NOTICE);
        $bilgn = $_POST['bilgn'];
        $submit = $_POST['submit']; 
        $sisa = $bilgn % 2 == 1;
        if ($submit) {
            if ($sisa) {
                $hasil = "Ganjil";
            } else {
                $hasil = "Genap";
            }
            echo "Bilangan $bilgn merupakan bilangan $hasil";
        }
    ?>
</body>
</html>

<!-- http://localhost/MODUL3/ganjilgenap.php -->