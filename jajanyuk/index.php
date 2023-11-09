<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","jajanyuk");
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Jajan Yuk!</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<img src="foto/makannn.png" alt="" class="img-responsive" height="0" width="1500"/>
<?php include 'menu.php';?>


<!- - konten - ->
<section class="konten">
	<div class="container">
		<h1>Menu Terbaru</h1>

		<div class="row">
			
			<?php $ambil = $koneksi->query("SELECT * FROM data_menu"); ?>
			<?php while($perproduk=$ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="fotoproduk/<?php echo $perproduk['foto_menu'];?>" alt="" width="500" heigth="600">
					<div class="caption">
						<h3><?php echo $perproduk['nama_menu'];?></h3>
						<h5><?php echo number_format($perproduk['harga_menu']);?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_menu'];?>" class="btn btn-primary">Pesan</a>
						<a href="detail.php?id=<?php echo $perproduk['id_menu'];?>"class="btn btn-default">detail</a>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>
</body>
</html>