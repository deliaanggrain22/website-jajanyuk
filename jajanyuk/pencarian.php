<?php $koneksi = new mysqli("localhost","root","","jajanyuk"); ?>
<?php
$keyword=$_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT*FROM data_menu WHERE nama_menu LIKE '%$keyword%' OR deskripsi_menu LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
</head>
<body>
<?php include 'menu.php';?>
	<div class="container">
		<h3>hasil pencarian : <?php echo $keyword?></h3>

		<?php if (empty($semuadata)):?>
			<div class="alert alert-danger"> <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
		<?php endif ?>

		<div class="row">

			<?php foreach ($semuadata as $key => $value): ?>

			<div class="col-md-3">
				<div class="thumbnail">
					<img src="fotoproduk/<?php echo $value['foto_menu'];?>" alt="" class="img-responsive">
						<div class="caption">
							<h3><?php echo $value['nama_menu'];?></h3>
							<h5><?php echo number_format($value['harga_menu']);?></h5>
							<a href="beli.php?id=<?php echo $value['id_menu'];?>" class="btn btn-primary">Pesan</a>
							<a href="detail.php?id=<?php echo $value['id_menu'];?>"class="btn btn-default">detail</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>

</body>
</html>