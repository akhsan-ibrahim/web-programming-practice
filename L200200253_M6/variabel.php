<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["selectedValue"])) {
        $selectedValue = $_POST["selectedValue"];

        // Lakukan sesuatu dengan value option yang diterima, contoh:
        echo "Anda memilih option dengan value: " . $selectedValue;
    } else {
        echo "Tidak ada data yang diterima.";
    }
}
?>
