<h2><center>Data Menu</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

<link rel="stylesheet"  href="css/style.css"  type="text/css"> 

<table class="table table-bordered">
	<thead>
		<tr>
			<th>nomor</th>
			<th>nama</th>
			<th>stok</th>
			<th>harga</th>
			<th>deskripsi</th>
			<th>foto</th>
			<th>aksi</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM data_menu"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_menu']; ?></td>
			<td><?php echo $pecah['stok_menu']; ?></td>
			<td><?php echo $pecah['harga_menu']; ?></td>
			<td><?php echo $pecah['deskripsi_menu']; ?></td>
			<td>
				<img src="../fotoproduk/<?php echo $pecah['foto_menu']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_menu'];?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_menu'];?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah</a>