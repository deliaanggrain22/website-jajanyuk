<?php session_start()?>
<?php
$koneksi = new mysqli("localhost","root","","jajanyuk");
$id_produk=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM data_menu WHERE id_menu='$id_produk'");
$detail=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Detail Menu</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="fotoproduk/<?php echo $detail['foto_menu'];?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_menu"];?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_menu"]);?></h4>

				<h5>Stok: <?php echo $detail['stok_menu']?></h5>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_menu']?>">
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Pesan</button>
							</div>
						</div>
					</div>
				</form>

				<?php
				if (isset($_POST["beli"]))
				{
					$jumlah=$_POST["jumlah"];
					$_SESSION["keranjang"][$id_produk]=$jumlah;

					echo "<script>alert('Menu telah masuk ke keranjang');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>
					<p><?php echo $detail["deskripsi_menu"];?></p>
			</div>
		</div>
	</div>
</section>
</body>
</html>

