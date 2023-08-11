<?php
	session_start();
	echo " Selamat Datang ".$_SESSION['username']."<br>";
	echo "Anda login sebagai ".$_SESSION['status'];
?>

<br><br>
Silahkan logout dengan klik link <a href='l253_t1_logout.php'> di sini</a>