<?php
    $filepath1 = 'l1_data.json';
    $getFile1 = file_get_contents($filepath1);
    $data1 = json_decode($getFile1, true);
    echo "LATIHAN 1 <br>";
    print_r($data1);
    echo "<br>";
    echo $data1['namaLengkap'];
    echo "<br>";
    echo $data1['mataKuliah'][0];

    $filepath2 = 'l2_namaMahasiswa.json';
    $getFile2 = file_get_contents($filepath2);
    $data2 = json_decode($getFile2, true);
    echo "<br><br>LATIHAN 2<br>";
    print_r($data2);
    echo "<br>";
    echo $data2['mahasiswa'][0]['namaLengkap'];
    echo "<br>";
    echo $data2['mahasiswa'][1]['namaLengkap'];

    $filepath3 = 'l3_external.json';
    $getFile3 = file_get_contents($filepath3);
    $data3 = json_decode($getFile3, true);
    echo "<br><br>LATIHAN 3 <br>";
    print_r($data3);
    echo "<br>";
    echo $data3['quiz']['sport']['q1']['answer'];
?>