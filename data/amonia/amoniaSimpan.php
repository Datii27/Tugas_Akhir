<?php

include './../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $amonia = $_POST['amonia'];
  $tanggal = date('Y-m-d H:i:s');


  $my = mysqli_query($coon, "INSERT INTO amonia VALUES (NULL, '$amonia', '$tanggal', NULL);");


}
