<?php
session_start();
error_reporting(E_ALL);

$koneksi = new mysqli("localhost", "root", "", "jajanyuk");

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>nota pesanan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<section class="konten">
	<div class="container">

	<center><h1>Detail Pembayaran</h1></center>
	<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
	<hr color="black">
<?php

//$ambil = $koneksi->query("SELECT * FROM data_pembayaran JOIN data_customer ON data_pembayaran.id_customer=data_customer.id_customer WHERE data_pembayaran.id_pesanan='$_GET[id]'");
//$detail = $ambil->fetch_assoc();

$stmt = $koneksi->prepare("SELECT * FROM data_pembayaran JOIN data_customer ON data_pembayaran.id_customer = data_customer.id_customer WHERE data_pembayaran.id_pesanan = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) 
    $detail = $result->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Pemesanan</h3>
		<strong>No. Pemesanan: <?php echo $detail['id_pesanan']?></strong><br>
		Total: Rp. <?php echo $detail['total_harga']; ?><br>
		Tanggal: <?php echo $detail['tanggal'];?>
	</div>

	<div class="col-md-4">
		<h3>Customer</h3>
			<strong><?php echo $detail['nama_cust'];?></strong><br>
		<p>
			<?php echo $detail['no_telp']; ?> <br>
			<?php echo $detail['email_cust']; ?>
		</p>
	</div>

	<div class="col-md-4">
		<h3>Keterangan</h3>
			<strong><?php echo $detail['keterangan'];?></strong><br>
			No. Meja: <?php echo $detail['no_meja']; ?>
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
		<?php $ambil=$koneksi->query("SELECT * FROM data_pesanan WHERE id_pesanan='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['jumlah_menu']; ?></td>
			<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table> 

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan lakukan pembayaran ke kasir Rp. <?php echo number_format($detail['total_harga']); ?>
			</p>
	</div>
</section>

</body>
</html>

