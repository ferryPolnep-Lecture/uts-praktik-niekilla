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

// Mengambil data dari tabel krs
$sql = "SELECT id, nama, nim, kelas, mata_kuliah FROM krs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Daftar KRS Mahasiswa</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Nama</th><th>NIM</th><th>Kelas</th><th>Mata Kuliah</th><th>Aksi</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['kelas']}</td>
                <td>{$row['mata_kuliah']}</td>
                <td>
                    <a href='update_krs.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete_krs.php?id={$row['id']}'>Hapus</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data";
}

$conn->close();
?>
