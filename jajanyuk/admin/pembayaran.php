<h2><center>Status Pesanan</center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">
<link rel="stylesheet"  href="css/style.css"  type="text/css">
<?php
//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM data_pembayaran JOIN data_customer ON data_pembayaran.id_customer=data_customer.id_customer WHERE data_pembayaran.id_pesanan = '$id_pembelian'");
$detail = $ambil->fetch_assoc();


?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['nama_cust']?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['tanggal']?></td>
			</tr>
			<tr>
				<th>Keterangan</th>
				<td><?php echo $detail['keterangan']?></td>
			</tr>
			<tr>
				<th>No.Meja</th>
				<td><?php echo $detail['no_meja']?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td><?php echo $detail['total_harga']?></td>
			</tr>
		</table>
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">-Pilih Status-</option>
			<option value="paid">paid</option>
			<option value="in process">in process</option>
			<option value="delivere">delivere</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">proses</button>
</form>

<?php 
if (isset($_POST["proses"]))
{
	$status = $_POST["status"];
	$koneksi->query("UPDATE data_pembayaran SET status_pesanan='$status' WHERE id_pesanan='$id_pembelian'");

	echo "<script>alert('status terupdate');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>