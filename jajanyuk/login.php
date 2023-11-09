<?php
session_start();
$koneksi = new mysqli("localhost","root","","jajanyuk");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Login Customer</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default" margin= 250px>
				<div class="panel-heading">
					<center><h3 class="panel-title">Login Customer</h3></center>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" name="login">Login</button>
						Not register ? <a href="daftar.php" >click here </a> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php

if (isset($_POST["login"]))
{
	$email=$_POST["email"];
	$password=$_POST["password"];
	//lakukan query ngecek akun di tabel data_customer di database
	$ambil = $koneksi->query("SELECT * FROM data_customer WHERE email_cust='$email' AND password_cust='$password'");

	//ngitung akun yg terambil
	$akunyangcocok = $ambil->num_rows;

	//jika 1 akun yang cocok, maka berhasil login
	if ($akunyangcocok==1)
	{
		//anda sukses login
		//mendapatkan akun dalam array
		$akun = $ambil->fetch_assoc();
		//simpan di session pelanggan
		$_SESSION["pelanggan"]=$akun;
		echo "<script>alert('anda berhasil login');</script>";

		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='index.php';</script>";
		}
	}
	else
	{
		//anda gagal login
		echo "<script>alert('anda gagal login, periksa kembali');</script>";
		echo "<script>location='login.php';</script>";
	}
}

?>
</body>
</html>