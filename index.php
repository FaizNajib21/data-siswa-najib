<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi CRUD PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
        <h1>Database Email Siswa</h1>
    </header>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM data_email";
        $result = mysqli_query($koneksi, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td><img src='".$row['gambar'] . "' alt='gambar' widht='100' height='100'></td>";
            echo "<td><a href='edit.php?id=".$row['ID']."'>Edit</a> | <a href='hapus.php?id=".$row['ID']."'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
	<a id="tambahBtn" href="tambah.php">Tambah Nama</a>
</body>
</html>
