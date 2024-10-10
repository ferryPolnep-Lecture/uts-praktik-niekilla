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

// Mendapatkan ID mahasiswa yang akan di-update
$id = $_GET['id'];

// Mengambil data mahasiswa berdasarkan ID
$sql = "SELECT * FROM krs WHERE id=$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $makul = implode(", ", $_POST['makul']);

    // Update data di database
    $sql = "UPDATE krs SET nama='$nama', nim='$nim', kelas='$kelas', mata_kuliah='$makul' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui!";
        header("Location: read_krs.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit KRS</title>
</head>
<body>
    <h2>Edit KRS Mahasiswa</h2>
    <form method="POST" action="">
        <label for="name">Nama Mahasiswa: </label><br>
        <input type="text" name="name" value="<?php echo $data['nama']; ?>"><br>
        <label for="nim">Nomor Induk Mahasiswa: </label><br>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>"><br>
        <label for="kelas">Kelas: </label><br>
        <input type="radio" name="kelas" value="5A" <?php if ($data['kelas'] == '5A') echo "checked"; ?>>Kelas 5A<br>
        <input type="radio" name="kelas" value="5B" <?php if ($data['kelas'] == '5B') echo "checked"; ?>>Kelas 5B<br>
        <input type="radio" name="kelas" value="5C" <?php if ($data['kelas'] == '5C') echo "checked"; ?>>Kelas 5C<br>
        <input type="radio" name="kelas" value="5D" <?php if ($data['kelas'] == '5D') echo "checked"; ?>>Kelas 5D<br>
        <input type="radio" name="kelas" value="5E" <?php if ($data['kelas'] == '5E') echo "checked"; ?>>Kelas 5E<br>
        <label for="makul">Mata Kuliah Pilihan: </label><br>
        <input type="checkbox" name="makul[]" value="WebApp" <?php if (strpos($data['mata_kuliah'], 'WebApp') !== false) echo "checked"; ?>>Web Application Development<br>
        <input type="checkbox" name="makul[]" value="MobileApp" <?php if (strpos($data['mata_kuliah'], 'MobileApp') !== false) echo "checked"; ?>>Mobile Application Development<br>
        <input type="checkbox" name="makul[]" value="UI/UX" <?php if (strpos($data['mata_kuliah'], 'UI/UX') !== false) echo "checked"; ?>>UI/UX Design<br>
        <input type="checkbox" name="makul[]" value="SoftEng" <?php if (strpos($data['mata_kuliah'], 'SoftEng') !== false) echo "checked"; ?>>Software Engineering<br>
        <input type="checkbox" name="makul[]" value="DataEng" <?php if (strpos($data['mata_kuliah'], 'DataEng') !== false) echo "checked"; ?>>Data Engineering<br><br>
        <input type="submit" value="Update KRS">
    </form>
</body>
</html>
