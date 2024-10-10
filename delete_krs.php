<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts5a";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID yang akan dihapus
$id = $_GET['id'];

// Menghapus data dari tabel krs
$sql = "DELETE FROM krs WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
    header("Location: read_krs.php");
} else {
    echo "Error menghapus data: " . $conn->error;
}

$conn->close();
?>
