<?php

$ambil = $koneksi -> query("SELECT * FROM data_menu WHERE id_menu='$_GET[id]'");
$pecah = $ambil -> fetch_assoc();
$fotoproduk=$pecah['foto_menu'];
if (file_exists("../fotoproduk/$fotoproduk"))
{
	unlink("../fotoproduk/$fotoproduk");
}

$koneksi -> query("DELETE FROM data_menu WHERE id_menu='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>