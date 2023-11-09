<?php
session_start();

$koneksi = new mysqli("localhost","root","","jajanyuk");

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('keranjang kosong, silahkan pilih menu');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Keranjang</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	
<?php include 'menu.php';?>
	
<section class="konten">
	<div class="container">
		<center><h1>Keranjang</h1></center>
		<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
		<hr color="black">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Menu</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
				<?php
				$ambil = $koneksi->query("SELECT * FROM data_menu WHERE id_menu='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah['harga_menu']*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["nama_menu"];?></td>
					<td>Rp. <?php echo number_format($pecah["harga_menu"]);?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga);?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-danger btn-xs">hapus</a>
					</td>
				</tr>
			<?php $nomor++;?>
			<?php endforeach ?>
			</tbody>
		</table>

		<a href="index.php" class="btn btn-default">Lanjut pilih menu</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>


</body>
</html>