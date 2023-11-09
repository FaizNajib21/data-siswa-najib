<?php
include 'koneksi.php';

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // Periksa apakah ada gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = 'folder_gambar/' . $gambar_name;

        // Pindahkan gambar yang diunggah
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql_select_old_image = "SELECT gambar FROM data_email WHERE id=?";
            $stmt_select = mysqli_prepare($koneksi, $sql_select_old_image);
            mysqli_stmt_bind_param($stmt_select, "i", $id);
            mysqli_stmt_execute($stmt_select);
            $result = mysqli_stmt_get_result($stmt_select);

            if ($row = mysqli_fetch_assoc($result)) {
                $old_image_path = $row['gambar'];
                if ($old_image_path && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            $sql = "UPDATE data_email SET nama=?, email=?, gambar=? WHERE id=?";
            $stmt_update = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt_update, "sssi", $nama, $email, $gambar_path, $id);
            mysqli_stmt_execute($stmt_update);

            if ($stmt_update) {
                header("location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        $sql = "UPDATE data_email SET nama=?, email=? WHERE id=?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $nama, $email, $id);
        mysqli_stmt_execute($stmt);

        if ($stmt) {
            header("location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
