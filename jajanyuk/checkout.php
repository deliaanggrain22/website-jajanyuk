<?php  
session_start();
error_reporting(0);
$koneksi = new mysqli("localhost","root","","jajanyuk");

// Jika belum login, maka arahkan ke halaman login.php
if (!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('Silahkan login');</script>";
  echo "<script>location='login.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<?php include 'menu.php';?>

<section class="konten">
  <div class="container">
    <center><h1>Checkout</h1></center>
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
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $totalbelanja = 0; ?>
        <?php $jumlah_menu = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
          <?php
          $ambil = $koneksi->query("SELECT * FROM data_menu WHERE id_menu='$id_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah['harga_menu'] * $jumlah;
          ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama_menu"]; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga_menu"]); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja += $subharga; ?>
          <?php $jumlah_menu += $jumlah; ?>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Pesanan</th>
          <th>Rp. <?php echo number_format($totalbelanja); ?></th>
        </tr>
      </tfoot>
    </table>

    <form method="post">
      <div class="form-group">
        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_cust'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['no_telp'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <select name="keterangan" class="form-control">
          <option value="keterangan">--Pilih Keterangan--</option>
          <option value="Dine In">Dine In</option>
          <option value="Take Away">Take Away</option>
        </select>
      </div>
      <div class="form-group">
        <input type="text" name="meja" placeholder="Masukkan nomor meja" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="notes" placeholder="Notes" class="form-control">
      </div>
      <button class="btn btn-primary" name="checkout">Checkout</button>
    </form>

    <?php
    if (isset($_POST['checkout']))
    {
      $keterangann = $_POST["keterangan"];
      $no_meja = $_POST["no_meja"];
      $tanggal = date("Y-m-d");
      $note = $_POST["notes"];
      $id_customer = $_SESSION["pelanggan"]["id_customer"];
      $jumlah_menu = $jumlah;
      $total_harga = $totalbelanja;

      // MENYIMPAN DATA KE data_pembayaran
      $koneksi->query("INSERT INTO data_pembayaran(id_pesanan,keterangan,no_meja,tanggal,note,id_customer,jumlah_menu,total_harga,status_pesanan)
      VALUES ('$id_pesanan','$keterangann','$no_meja','$tanggal','$note','$id_customer','$jumlah_menu','$total_harga','$status_pesanan')");  

      // MENYIMPAN DATA KE data_pesanan
      $id_pesanan = $koneksi->insert_id;

      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
      {
        // Mendapatkan data produk berdasarkan id_produk
        $ambil = $koneksi->query("SELECT * FROM data_menu WHERE id_menu='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $nama = $perproduk['nama_menu'];
        $harga = $perproduk['harga_menu'];
        $subharga = $perproduk['harga_menu'] * $jumlah;

        $koneksi->query("INSERT INTO data_pesanan (id_pesanan,id_menu,jumlah_menu,nama,harga,subharga)
          VALUES ('$id_pesanan','$id_menu','$jumlah_menu','$nama','$harga','$subharga') ");

        // Skrip update stok
        $koneksi->query("UPDATE data_menu SET stok_menu = stok_menu - $jumlah WHERE id_menu='$id_produk'");
      }

      // Mengosongkan keranjang
      unset($_SESSION["keranjang"]);

      // Tampilan dialihkan ke halaman nota
      echo "<script>alert('Pesanan di proses');</script>";
      echo "<script>location='nota.php?id=$id_pesanan';</script>";
    }
    ?>
  </div>
</section>
</body>
</html>
