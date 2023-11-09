<?php
session_start();
$koneksi = new mysqli("localhost","root","","jajanyuk");

include 'menu.php';

//proteksi
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

//mendapat id pembelian dari url
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM data_pembayaran WHERE id_pesanan='$idpem'");
$detpem=$ambil->fetch_assoc();

//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_customer"];
//mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_customer"];

if ($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('Silahkan Bayar ke Kasir');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<h2>Status Pesanan</h2>
	<div class="alert alert-info">Total pesanan anda <strong>Rp. <?php echo number_format($detpem["total_harga"])?></strong></div>

	<form method="post">

		<div class="form-group">
			<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_cust']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" readonly value="<?php echo $detpem["keterangan"]?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" readonly value="<?php echo $detpem["no_meja"]?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status">
			<option value="">-Pilih Status-</option>
			<option value="accepted">accepted</option>
			</select>
			</div>
			<button class="btn btn-primary" name="proses">proses</button>
	</form>

</body>
</html>

<?php 
if (isset($_POST["proses"]))
{
	$status = $_POST["status"];
	$koneksi->query("UPDATE data_pembayaran SET status_pesanan='$status' WHERE id_pesanan='$idpem'");

	echo "<script>alert('status terupdate');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>