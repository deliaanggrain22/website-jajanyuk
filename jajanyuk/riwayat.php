<?php
session_start();
$koneksi = new mysqli("localhost","root","","jajanyuk");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Riwayat Pesanan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';

//proteksi
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

?>

<section class="riwayat">
	<div class="container">
		<center><h1>Riwayat Pesanan <?php echo $_SESSION["pelanggan"]["nama_cust"]?></h1></center>
		<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
		<hr color="black">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor=1;
				$id_pelanggan=$_SESSION["pelanggan"]['id_customer'];
				$ambil = $koneksi->query("SELECT * FROM data_pembayaran WHERE id_customer='$id_pelanggan'");
				while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["tanggal"]?></td>
					<td><?php echo $pecah["status_pesanan"]?></td>
					<td>Rp. <?php echo number_format ($pecah["total_harga"])?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pesanan"]?>" class="btn btn-info">Nota</a>

						<?php if ($pecah['status_pesanan']=="delivere"):?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pesanan"]?>" class="btn btn-success">status</a>
						<?php endif ?>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php } ?>
		</table>
	</div>
</section>
</body>
</html>