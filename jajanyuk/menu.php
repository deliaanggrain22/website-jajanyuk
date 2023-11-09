<!- - navbar - ->
<nav class="navbar navbar-default">
	<div class="container">
   
		<ul class="nav navbar-nav">
			<li><img src="foto/logoo 2.png" alt="" class="img-responsive" height="60" width="60"/></li>    
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>

			<!- - jika sudah login - ->
			<?php if(isset($_SESSION["pelanggan"])):?>
				<li><a href="riwayat.php">Riwayat Pesanan</a></li>
				<li><a href="logout.php">Logout</a></li>

			<!- - jika belum login - ->
			<?php else:?>
				<li><a href="daftar.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			<?php endif?>
			
			<li><a href="checkout.php">Checkout</a></li>
		</ul>

		<form action="pencarian.php" method="get" class="navbar-form navbar-right">
			<input type="text" class="form-control" name="keyword">
			<button class="btn btn-primary">Search</button>
		</form>
	</div>
</nav>