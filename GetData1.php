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

// Ambil status LED1 dari permintaan POST
$led1_status = $_POST["state1"];

// Persiapkan dan jalankan query untuk menyimpan status LED1
$sql = "INSERT INTO led_status (led1_status) VALUES ($led1_status)";

if ($conn->query($sql) === TRUE) {
    echo "Status LED1 berhasil diperbarui.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
