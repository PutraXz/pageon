<?php
// memuat koneksi ke database
include "../koneksi.php";

// mengambil semua pesan dari database
$query = $conn->query("SELECT * FROM messages ORDER BY id_messages DESC");

// menampilkan semua pesan dalam format HTML
while ($row = $query->fetch_array()) {
  echo "<p>" . $row['username'] . ": " . $row['message'] . "</p>";
}
