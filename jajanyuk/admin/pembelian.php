<h2><center>Data Pembelian</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">
<link rel="stylesheet"  href="css/style.css"  type="text/css">

<table class="table">
	<thead>
		<tr>
			<th>no</th>
			<th>nama costumer</th>
			<th>tanggal</th>
			<th>status</th>
			<th>total harga</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM data_pembayaran JOIN data_customer ON data_pembayaran.id_customer=data_customer.id_customer");?>
		<?php while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_cust'];?></td>
			<td><?php echo $pecah['tanggal'];?></td>
			<td><?php echo $pecah['status_pesanan'];?></td>
			<td><?php echo $pecah['total_harga'];?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pesanan'];?>" class="btn btn-info">detail</a>

				<?php if ($pecah['status_pesanan']!=="accepted"):?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pesanan'];?>" class="btn btn-success">Status</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>