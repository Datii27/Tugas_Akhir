<?php

include './../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ph = $_POST['ph'];
    $tanggal = date('Y-m-d H:i:s');

    $my = mysqli_query($coon, "INSERT INTO ph VALUES (NULL, '$ph', '$tanggal', NULL);");

  
}
