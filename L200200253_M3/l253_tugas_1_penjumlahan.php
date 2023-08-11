<html>
<head><title>L200200253 Penjumlahan</title></head>
<body>
    <form action="l253_tugas_1_penjumlahan.php" method="post">
        Nilai A adalah <input type="text" name="input1" size="3"></br>
        Nilai B adalah <input type="text" name="input2" size="3"></br>
        <input type="submit" value="Jumlahkan" name="submit">
    </form>
    <?php
        error_reporting(E_ALL & E_NOTICE);
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];
        $submit = $_POST['submit'];
        if ($submit) {
            $hasil = $input1 + $input2;
            echo "NIlai A adalah $input1</br>";
            echo "NIlai B adalah $input2</br>";
            echo "Jadi Nilai A ditambah Nilai B adalah $hasil";
        }
    ?>
</body>
</html>