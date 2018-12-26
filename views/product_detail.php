<?php
	include('db/api/get_product.php');

	$product = getProduct($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HT ENTE</title>
	<link rel="icon" href="../assets/images/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src=""></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/css/product_detail.css">
	<link rel="stylesheet" href="../assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131374777-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-131374777-1');
	</script>

</head>
<body>
	<header>
		<div class="container-fluid">            
			<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
				<!--LOGO-->
				<a class="navbar-brand" href="/home">
					<img src="../assets/images/logo.png" alt="logo" style="width:40px;">
				</a>
				<a class="navbar-brand" href="/home"><strong>HT ENTE</strong></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-end col-8 text-center">
						<li class="nav-item col-2">
							<a class="nav-link " href="/home">Home</a>
						</li>
						<li class="nav-item col-2 active ">
							<a class="nav-link" href="/products">Product<span class="sr-only">(current)</span></a>
						</li>
					</ul>

					<form action="/search" method="post" class="form-inline my-2 mylg-0">
						<input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="search" aria-label="search">
						<button class="btn btn-outline-success" type="submit" name="submit">search</button>
					</form>
				</div>
			</nav>
		</div>
	</header><br>

	<div class="row">
		<div class="col-sm-1">

		</div>
		<!--left col-->
		<!-- FOTO-->
		<div class="col-sm-4 item-photo">
			<!--CAROSEL-->
			<div class="container-fluid">
				<div class="row">

				</div>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<?php
						echo '
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="'.$product->image1.'" style="max-width:100%" alt="...">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="'.$product->image2.'" style="max-width:100% alt="...">
						</div>
						<div class="carousel-item">
							<img  class="d-block w-100" src="'.$product->image3.'" style="max-width:100% alt="...">
						</div>
					</div>
						';
					?>
					<a class="carousel-control-prev geser" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon " aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next geser" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon " aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div><br><br>
			 <!--/CAROSEL-->
		</div> 
		<!--right col-->
		<div class="col-sm-5">
			<!--DESKRIPSI-->
			<div class="container-fluid">
				<?php
					echo '
						<div class="product_name">
							<h2 class="tulisan text-left">'.$product->name.'</h2><hr>
						</div>
						<div class="harga">
							<p class="tulisan text-justify">Harga : Rp '.$product->cost.'</p>
						</div>
						<div class="spesifikasi">
							<p class="tulisan text-justify">Spesifikasi</p>
							<div class="isi">
								<pre>'.$product->description.'</pre>
							</div>
						</div><br>
					';
				?>
				<div class="row">
					<!--UNTUK USER-->
					<div class="col-sm-12">
						<div class="row justify-content-center">
							<div class="info_pemesanan">
								<button class="btn btn-lg btn-success pemesanan" data-toggle="modal" data-target="#product_view" ><i class="glyphicon glyphicon-ok-sign"></i> PEMESANAN</button>
							</div>
						</div>
					</div>     
				</div>
			</div>
		</div>
	</div>

	<!--MODAL-->
	<div class="modal fade product_view" id="product_view">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					<h3 class="text-center modal-title">Aturan dan Tata Cara Menyewa Handy Talky</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-10 content">
						<div class="aturan_sewa">
							<h4>Aturan Sewa</h4>
						</div>
						<div class="aturan text-justify">
							<ol>
								<li>Pembayaran harus di bayar lunas sebelum waktu penyewaan. Pembayaran dapat dilakukan via langsung atau transfer ke rekening <span class="pembayaran"><b>BCA a/n Muhammad Akbar Pramuditya  4372249742 </b></span></li>
								<li>Apabila terjadi over time, maka akan di kenakan charge sesuai harga sewa normal (maksimal penyewaan 24 jam)</li>
								<li>Kerusakan atau kehilangan ditanggung oleh penyewa :
									<ol type="a">
										<li>Mengganti dengan spesifikasi yang sama (cari sendiri) dengan membayar denda ketidaklengkapan sebesar  25.000/Hari (Bukan Per Unit Tidak Lengkap)</li>
										<li>Mengganti uang berdasarkan nominal tertera pada pricelist <span class="kerusakan"><b>HT 500.000, Premium(sky_max / baofeng uv 5r) | Batrai 150.000 , | Headset 50.000, / beltclip 25.000 | Kerusakan & Kehilangan lain yang   tidak tercantum, harga menyesuaikan </b></span></li>
									</ol>
								</li>
								<li>Selama penyewaan tidak boleh memindahkan hak sewa kepada orang lain, jika di lakukan maka segala resiko yang timbul dari butir 1, 2, dan 3 akan menjadi tanggung jawab penyewa sepenuhnya</li>
								<li>Apabila terjadi suatu pelanggaran atau terjadi penyitaan barang pinjaman, maka penyewa bertanggung jawab sepenuhnya</li>
								<li>Peralatan yang hendak dipinjam harap dicek terlebih dahulu kelengkapannya. Jika HT telah berada di tangan penyewa, maka segala bentuk kekurangan atau kerusakan menjadi tanggung jawab penyewa </li>
							</ol>
						</div>
						<div class="aturan_penyewaan">
							<h4>Tata Cara Penyewaan</h4>
						</div>
						<div class="aturan text-justify">
							<ol>
								<li>Dapat menghubungi via WA / official akun line dari Hate Ente</li>
								<li>Mengisi identitas dan tanggal serta lama menyewaan (sesuai format yang nnati diberikan)</li>
								<li>Melampirkan foto ktp/sim/tanda pengenal lainnya</li>
								<li>Apabila sudah mentransfer untuk dp, dapat mengirimkan bukti SC transfernya</li>
								<li>Untuk informasi lebih lanjut, dapat menghubungi via WA/official akun Hate Ente</li>
							</ol>
						</div>
					</div>
					<div class="col-md-11 content">
						<div class="pesan text-center">
							<a href="https://wa.me/6281376201449" target="_blank"><button class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok-sign"></i> PESAN</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br><br>
	<!-- FOOTER -->
	<div class="container-fluid">
		<div class="footer"><strong>&copy;Copyright HT ENTE</strong></div>
	</div>
	
</body>
</html>