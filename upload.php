<?php
// Koneksi ke database
$conn = new mysqli("localhost", "username", "password", "data_siswa");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$image_data = file_get_contents($_FILES['image']['tmp_name']);

// Masukkan data gambar ke database
$stmt = $conn->prepare("INSERT INTO data_email (gambar) VALUES ( ?)");
$stmt->bind_param("sss", $image_name, $image_type, $image_data);

if ($stmt->execute()) {
    echo "Gambar berhasil diunggah ke database.";
} else {
    echo "Terjadi kesalahan saat mengunggah gambar.";
}

// Tutup koneksi database
$stmt->close();
$conn->close();
?>