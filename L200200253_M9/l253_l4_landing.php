<?php
	session_start();
	echo "Anda berhasil login sebagai ".$_SESSION['username']." dan Anda terdaftar sebagai ".$_SESSION['status'];
?>

<br><br>
Silahkan logout dengan klik link <a href='l253_l5_logout.php'> di sini</a>