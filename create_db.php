<?php
$servername = "localhost";
$username = "root";  // Sesuaikan dengan username MySQL Anda
$password = "";      // Sesuaikan dengan password MySQL Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Membuat database
$sql = "CREATE DATABASE IF NOT EXISTS uts5a";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat<br>";
} else {
    echo "Error membuat database: " . $conn->error;
}

// Pilih database yang dibuat
$conn->select_db("uts5a");

// Membuat tabel krs
$sql = "CREATE TABLE IF NOT EXISTS krs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    nim VARCHAR(10) NOT NULL,
    kelas ENUM('5A', '5B', '5C', '5D', '5E') NOT NULL,
    mata_kuliah TEXT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabel krs berhasil dibuat";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

$conn->close();
?>
