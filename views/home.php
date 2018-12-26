<!DOCTYPE html>
<html>
<head>
	<title>HT ENTE</title>
	<link rel="icon" href="../assets/images/logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<link rel="stylesheet" href="../assets/css/home.css">
	<script src="assets/js/home.js"></script>
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
	<!--NAVBAR-->
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
						<li class="nav-item active col-2">
							<a class="nav-link " href="/home">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item col-2">
							<a class="nav-link" href="/products">Product</a>
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

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		<img src="../assets/images/htente.gif" class="d-block w-100" width="800" height="200">
			</div>
		</div>
	</div><br>

<!--CAROSEL-->
	<!-- <div class="container">
		<div class="row">

		</div>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="../assets/images/home1.png" width="800" height="400" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Komunikasi Lancar Tanpa Permasalahan</h5>
						<p>...</p>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="../assets/images/home2.png" width="800" height="400" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Komunikasi Lancar Tanpa Permasalahan</h5>
						<p>...</p>
					</div>
				</div>
				<div class="carousel-item">
					<img  class="d-block w-100" src="../assets/images/home3.png" width="800" height="400" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Komunikasi Lancar Tanpa Permasalahan</h5>
						<p>...</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div><br><br> -->
<!--/CAROSEL-->
	<div class="row">
		<!--left col-->
		<div class="col-sm-8">
			<!--PRODUK TERARU-->
			<div class="container-fluid">
				<div class="new-product">
					<h2 class="tulisan text-left">Products Highlight</h2><hr><!--Sedikit Bimbang Karena Barangnya cuma 3 jenis-->
				</div>
				<!--INI ISINYA GAMBAR SEMUA QUERY AJA 7 gambar yang ada di DB-->
				<div class="foto-product">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<section class="customer-logos slider">
							<?php
								include('db/api/get_products.php');

								$products = getProducts();

								foreach ($products as $product) {
									echo '
										<div class="slide"><a href="/detail?id='.$product->id.'"><img src="'.$product->image1.'"></a></div>
										<div class="slide"><a href="/detail?id='.$product->id.'"><img src="'.$product->image2.'"></a></div>
										<div class="slide"><a href="/detail?id='.$product->id.'"><img src="'.$product->image3.'"></a></div>
									';
								}
							?>
						</section>
					</div>
				</div>
			</div><br><br>

			<!--DESKRIPSI-->
			<div class="container-fluid">
				<div class="deskipsi">
					<h2 class="tulisan text-left">Description</h2><hr>
				</div>
				<div class="isi">
					<p class="tulisan text-justify">Hate Ente merupakan tempat penyewaan handy talky (HT) terbaik dan termurah di wilayah bandung dan sekitarnya. Kami menawarkan jasa sewa handy Talky dengan kualitas terbaik dan stok tak terbatas. Dengan menggunakan HT kami, dijamin acara anda dapat berjalan dengan lancar.</p>
				</div>
			</div><br><br>
		</div>
		<!--right col-->
		<!-- about us-->
		<div class="col-sm-4">
		   <div class="container-fluid">
				<div class="about_us">
						<h2 class="tulisan text-left">Contact Us</h2><hr>
					</div>
			   <div class="isi">
					<p><i class="fa fa-envelope fa-1x"></i>E-Mail : htsewa068@gmail.com</p>
					<br />
					<p><i class="fa fa-phone fa-1x"></i> CP : 081376201449 - Reinhard Raymond </p>
					<br />
					<br />
				</div>
				<div class="follow">
					<div class="follow_us">
						<h4>FOLLOW US</h4>
					</div>
					<div class="social_media">
						<a href="instagram://user?username=bandungsewaht"><img src="../assets/images/instagram.svg" class="social"></i></a>
						<a href="https://wa.me/6281376201449" target="_blank" ><img src="../assets/images/whatsapp.svg" class="social"></i></a>
						<a href="http://line.me/ti/p/~@dxy4876d" target="_blank"><img src="../assets/images/line.svg" class="social"></i></a>
					</div>
				</div>

		   </div> 
		</div>
	</div>
	<!-- FOOTER -->
	<div class="container-fluid bg-dark">
		<div class="row copyright align-self-end">
			<div class="footer"><strong>&copy;Copyright HT ENTE</strong>.</div>
		</div>
	</div>
</body>
</html>