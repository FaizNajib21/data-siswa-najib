<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <a href="index.php">Kembali</a>
    <?php
    include 'koneksi.php';
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
        $sql = "SELECT * FROM data_email WHERE ID='$id'";
        $result = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_array($result);
    } else {
        echo "ID tidak ditemukan.";
    }
    ?>
    <form action="proses_edit.php" method="POST">
        Nama Produk: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        Gambar: <input type="file" name="gambar" value="<?php echo $row['gambar']; ?>"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
