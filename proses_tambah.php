<?php
// Import koneksi ke database
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $gambar = $_FILES['gambar'];

    if ($gambar['error'] === UPLOAD_ERR_OK) {
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_path = 'folder_gambar/' . $gambar_name;
    
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql = "INSERT INTO data_email (nama, email, gambar) VALUES ('$nama', '$email', '$gambar_path')"; // Menggunakan $gambar_path
    
            if (mysqli_query($koneksi, $sql)) {
                header("location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }
    
    
}
?>