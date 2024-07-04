<?php
// Koneksi ke database MySQL
$servername = "localhost"; // Ganti dengan nama host MySQL Anda
$username = "root";    // Ganti dengan username MySQL Anda
$password = "";    // Ganti dengan password MySQL Anda
$dbname = "dbstatusled"; // Ganti dengan nama database Anda
$dbport = "3307";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Query untuk mengambil status LED2 terbaru
$sql = "SELECT led2_status FROM led_status ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil hasil query (harusnya hanya satu baris karena LIMIT 1)
    $row = $result->fetch_assoc();
    $led2_status = $row["led2_status"];
    echo $led2_status;
} else {
    echo "0"; // Jika tidak ada data, kembalikan 0 (LED mati)
}

$conn->close();
