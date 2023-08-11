<?php
	session_start();
	error_reporting(E_ALL && E_NOTICE && E_DEPRECATED);
	$conn = mysqli_connect('localhost','root','','informatika');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$submit = $_POST['submit'];

	if ($submit) {
	    $sql = "SELECT * from user where username = '$username' and password = '$password'";
	    $query = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_array($query);

	    if ($row['username']!=""){
	        $_SESSION['username']=$row['username'];
	        $_SESSION['status']=$row['status'];
	        echo "<script>
		        alert('Anda login sebagai $row[username]');
		        document.location='l253_l4_landing.php';
 	       </script>";
        } else {
            echo"<script>
	            alert('Gagal login');
	            document.location='l253_l3_login.php';
            </script>";
        }
	}
?>

<form method='POST' action='l253_l3_login.php'>
    <p align='center'>
    	Username : <input type='text' name='username'><br>
    	Password : <input type='password' name='password'><br><br>
    	<input type='submit' name='submit'>
    </p>
</form>