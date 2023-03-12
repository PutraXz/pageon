<?php
// memuat koneksi ke database
include_once "../koneksi.php";
session_start();
// mengambil data dari permintaan Ajax
$message = $_POST['message'];
$username = $_SESSION['username'];

// menambahkan pesan ke database
$query = $conn->query("INSERT INTO messages (username, message) VALUES ('$username', '$message')")
?>
