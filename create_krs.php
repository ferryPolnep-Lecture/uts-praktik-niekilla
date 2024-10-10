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

// Memvalidasi input
$nama = $_POST['name'];
$nim = $_POST['nim'];
$kelas = $_POST['kelas'];
$makul = isset($_POST['makul']) ? implode(", ", $_POST['makul']) : '';

// Validasi input
    if (empty($nama) || empty($nim) || empty($kelas) || empty($makul)) {
        die("Semua field wajib diisi.");
    }
    
    if (!preg_match("/^[a-zA-Z\s]*$/", $nama)) {
        die("Nama hanya boleh berisi huruf.");
    }
    
    if (!preg_match("/^[0-9]{10}$/", $nim)) {
        die("NIM harus berupa angka dengan 10 digit.");
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO krs (nama, nim, kelas, mata_kuliah) VALUES ('$nama', '$nim', '$kelas', '$makul')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
