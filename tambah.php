<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <a href="index.php">Kembali</a>
    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
        Nama: <input type="text" name="nama"><br>
        Email: <input type="text" name="email"><br>
        Gambar: <input type="file" name="gambar"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
