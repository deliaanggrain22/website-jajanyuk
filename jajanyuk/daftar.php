<?php $koneksi = new mysqli("localhost","root","","jajanyuk");?>
<!DOCTYPE html>
<html>
<link rel="stylesheet"  href="css/style.css"  type="text/css"> 
<head>
	<title>Register</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php';?>
<center><img src="foto/logoo 2.png" alt="" class="img-responsive" height="100" width="100"/></center>
<hr color="black">

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Register Customer</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No Telp</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="telp" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php
						if (isset($_POST["daftar"]))
						{
							//mengambil input 
							$nama =$_POST["nama"];
							$email=$_POST["email"];
							$telp=$_POST["telp"];
							$password=$_POST["password"];

							//cek email
							$ambil = $koneksi->query("SELECT*FROM data_customer WHERE email_cust='$email'");
							$yangcocok = $ambil->num_rows;
							if ($yangcocok==1)
							{
								echo "<script>alert('Pendaftaran gagal, Email sudah digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else
							{
								$koneksi->query("INSERT INTO data_customer(nama_cust,email_cust,password_cust,no_telp)
									VALUES('$nama','$email','$password','$telp')");

								echo "<script>alert('Pendaftaran berhasil, Silahkan login');</script>";
								echo "<script>location='login.php';</script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>