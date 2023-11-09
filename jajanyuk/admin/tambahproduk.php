<h2><center>Tambah Menu</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

<link rel="stylesheet"  href="css/style.css"  type="text/css"> 

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
 </form>
 <?php
 if (isset($_POST['save']))
 {
 	$nama = $_FILES['foto']['name'];
 	$lokasi =$_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../fotoproduk/".$nama);
 	$koneksi->query("INSERT INTO data_menu(nama_menu,stok_menu,harga_menu,deskripsi_menu,foto_menu)
 	VALUES('$_POST[nama]','$_POST[stok]','$_POST[harga]','$_POST[deskripsi]','$nama')");

 	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

}
?>