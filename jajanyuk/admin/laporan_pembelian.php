<?php
$semuadata=array();
$tgl_mulai ="-";
$tgl_selesai ="-";
$status = "";
if (isset($_POST["kirim"]))
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$status = $_POST["status"];
	$ambil = $koneksi->query("SELECT * FROM data_pembayaran LEFT JOIN data_customer ON data_pembayaran.id_customer=data_customer.id_customer WHERE status_pembelian='$status' AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>

<h2><center>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></center></h2>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

<link rel="stylesheet"  href="css/style.css"  type="text/css">

<form method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>start date</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>finish date</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
				<option value="">Pilih Status</option>
				<option value="pending">pending</option>
				<option value="paid">paid</option>
				<option value="in process">in process</option>
				<option value="delivere">delivere</option>
				<option value="accepted">accepted</option>
		</select>
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">open</button>
		</div>
	</div>
</form>

<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Customer</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_harga']?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_cust']; ?></td>
			<td><?php echo $value['tanggal']; ?></td>
			<td>Rp. <?php echo number_format($value['total_harga']); ?></td>
			<td><?php echo $value['status_pembelian']; ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total)?></th>
		</tr>
	</tfoot>
</table> 


