<?php

$ambil = $koneksi -> query("SELECT * FROM data_customer WHERE id_customer='$_GET[id]'");
$pecah = $ambil -> fetch_assoc();

$koneksi -> query("DELETE FROM data_customer WHERE id_customer='$_GET[id]'");

echo "<script>alert('customer terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>