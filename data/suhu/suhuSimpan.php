<?php
// path_to_your_php_script.php - This is a separate PHP file to handle the data received from the client-side JavaScript
include './../../koneksi.php';
// Retrieve data sent from the client-side JavaScript using AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $suhu = $_POST['suhu'];
  $tanggal = date('Y-m-d H:i:s');

  // Perform any necessary processing with the data
  // For example, insert the data into the database:
  // include './../koneksi.php';
  $my = mysqli_query($coon, "INSERT INTO suhu VALUES (NULL, '$suhu', '$tanggal', NULL);");

  // Return a response to the client (optional)
  // echo 'Data received and processed successfully.';
}
