<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM data_email WHERE id=$id";
mysqli_query($koneksi, $sql);

header("location:index.php");
?>
