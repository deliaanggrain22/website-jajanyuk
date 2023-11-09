<h2><center>Data Pelanggan</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">
<link rel="stylesheet"  href="css/style.css"  type="text/css">

<table class="table">
	<thead>
		<tr>
			<th>no</th>
			<th>id</th>
			<th>nama</th>
			<th>email</th>
			<th>nomor telepon</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM data_customer");?>
		<?php while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['id_customer'];?></td>
			<td><?php echo $pecah['nama_cust'];?></td>
			<td><?php echo $pecah['email_cust'];?></td>
			<td><?php echo $pecah['no_telp'];?></td>
			<td>
				<a href="index.php?halaman=hapuscust&id=<?php echo $pecah['id_customer'];?>" class="btn-danger btn">hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>