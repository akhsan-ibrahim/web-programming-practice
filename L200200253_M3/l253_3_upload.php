<html>
<head><title>Upload Files</title></head>
<body>
    <?php
    error_reporting(E_ALL & E_NOTICE);
    $direktori = '/images/';
    $nama_foto = $_FILES['foto']['name'];
    $size_foto = $_FILES['foto']['size'];
    $tipe_foto = $_FILES['foto']['type'];
    $upload = $direktori.$nama_foto;
    $submit = $_POST['submit'];

    if ($submit) {
        move_uploaded_file($_FILES["foto"]["tmp_name"],$upload);
        echo "<h3> File berhasil di-upload </h3> 

        <img src='$upload' border='0'>
        </br> </br>

        <b> Informasi File :  </b> </br>
        Nama File : $nama_foto </br>
        Ukuran File : $size_foto byte </br>
        Tipe File : $tipe_foto </br>";
    }
    else {
    ?>
    <form action="l253_3_upload.php" enctype="multipart/form-data" method="post">
        Upload File : <input type="file" name="foto" size="20"></br>
        <input type="submit" value="upload" name="submit">
    </form>
    <?php
    }
    ?>
</body>
</html>