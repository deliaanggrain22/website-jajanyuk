<h2><center>Detail Pembayaran</center></h2>
<center><img src="foto/logoo.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">
<link rel="stylesheet"  href="css/style.css"  type="text/css">
<?php

$koneksi = new mysqli("localhost","root","","jajanyuk");

$ambil = $koneksi->query("SELECT * FROM data_pembayaran JOIN data_customer ON data_pembayaran.id_customer=data_customer.id_customer WHERE data_pembayaran.id_pesanan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Pemesanan</h3>
		<p>
			Tanggal: <?php echo $detail['tanggal'];?><br>
			Total: Rp. <?php echo number_format($detail['total_harga']); ?><br>
			Status: <?php echo $detail['status_pesanan'];?>
		</p>	
	</div>
	<div class="col-md-4">
		<h3>Customer</h3>
		<p>
		<strong><?php echo $detail['nama_cust'];?></strong> <br>
			<?php echo $detail['no_telp']; ?> <br>
			<?php echo $detail['email_cust']; ?>
		</p>
	</div>	
	<div class="col-md-4">
		<h3>Keterangan</h3>
		<p>
			<strong><?php echo $detail['keterangan'];?><br></strong>
			No.Meja: <?php echo $detail['no_meja']; ?><br>
			Notes: <?php echo $detail['note'];?>
		</p>	
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>menu</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM data_pesanan JOIN data_menu ON data_pesanan.id_menu=data_menu.id_menu 
		WHERE data_pesanan.id_pesanan='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_menu']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_menu']); ?></td>
			<td><?php echo $pecah['jumlah_menu']; ?></td>
			<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table> 