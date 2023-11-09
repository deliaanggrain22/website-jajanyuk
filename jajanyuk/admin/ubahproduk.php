<h2><center>UBAH MENU</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

<link rel="stylesheet"  href="css/style.css"  type="text/css"> 

<?php
$ambil=$koneksi->query("SELECT *FROM data_menu WHERE id_menu='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Menu</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_menu'];?>">
	</div>
	<div class="form-group">
		<label>Stok Menu</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_menu'];?>">
	</div>
	<div class="form-group">
		<label>Harga Menu</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_menu'];?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" ><?php echo $pecah['deskripsi_menu'];?></textarea>
	</div>
	<div class="form-group">
		<img src="../fotoproduk/<?php echo $pecah['foto_menu']?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
	$namafoto = $_FILES['foto']['name'];
 	$lokasifoto =$_FILES['foto']['tmp_name'];
 	if (!empty($lokasifoto))
 	{
 		move_uploaded_file($lokasifoto, "../fotoproduk/$namafoto");

 		$koneksi->query("UPDATE data_menu SET nama_menu='$_POST[nama]',stok_menu='$_POST[stok]',harga_menu='$_POST[harga]',deskripsi_menu='$_POST[deskripsi]',foto_menu='$namafoto' WHERE id_menu='$_GET[id]'");
 	}
 	else
 	{
 		$koneksi->query("UPDATE data_menu SET nama_menu='$_POST[nama]',stok_menu='$_POST[stok]',harga_menu='$_POST[harga]',deskripsi_menu='$_POST[deskripsi]' WHERE id_menu='$_GET[id]' ");
 	}
 	echo "<script>alert('menu telah di ubah');</script>";
 	echo "<script>location='index.php?halaman=produk';</script>";
}
?>