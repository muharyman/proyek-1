<?php
    include('assets/php/checkauth.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>HT ENTE</title>
	<link rel="icon" href="../assets/images/logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/products.css">
</head>
<body>
	<!--NAVBAR-->
	<header>
		<div class="container-fluid">            
			<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
				<!--LOGO-->
				<a class="navbar-brand" href="#">
					<img src="../assets/images/logo.png" alt="logo" style="width:40px;">
				</a>
				<a class="navbar-brand" href="#">HT ENTE</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-end col-8 text-center">
						<li class="nav-item col-2">
							<a class="nav-link " href="/home">Home</a>
						</li>
						<li class="nav-item col-2 active">
							<a class="nav-link" href="/products">Product<span class="sr-only">(current)</span></a>
						</li>
					</ul>

					<form action="#" method="post" class="form-inline my-2 mylg-0">
						<input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="search" aria-label="search">
						<button class="btn btn-outline-success" type="submit">search</button>
					</form>
				</div>
			</nav>
		</div>
	</header><br>
	<!--SUB JUDUL-->
	<div class="row">
		<div class="col-sm-10 align-content-center text-center container-fluid">
			<h5 class="h3">PRODUK</h3>
		</div>
		<div class="col-sm-2">
			<div class="container-fluid">
				<div class="tombol">
					<a href="/addproduct"><button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> ADD</button></a>
				</div>
			</div>
		</div>
	</div><hr>

	<!--search bar--><!-- Masih bimbang perlu atau tidak -->
	<!-- <div class="col-sm-12">
		<div class="container-fluid search">
			<form action="#" method="post" class="form-inline my-2 mylg-0">
				<input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="search" aria-label="search">
				<button class="btn btn-outline-success" type="submit">search</button>
			</form>
		</div>
	</div> -->


	<!--LIST PRODUK-->
	<!--DEFAULT TAMPILAN ITU 4 4 -->
	<div class="container-fluid">
		<div class="row">
			<!-- Disini Cukup 2 gambar per produk jadi tinggal di query foto 1 dan 2-->
			<?php
				include('db/api/get_products.php');

				$products = getProducts();

				foreach ($products as $product) {
					echo '
						<div class="col-md-3 col-sm-6">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="#">
										<img class="pic-1" src="'.$product->image1.'">
										<img class="pic-2" src="'.$product->image2.'">
									</a>
									<ul class="modify">
										<li><a href="/editproduct?id='.$product->id.'" class="edit_produt" data-tip="edit"><img src="../assets/images/pencil.png"></a></li>
										<li><a href="#" class="delete" data-tip="delete"><img src="../assets/images/eraser.png"></a></li>
									</ul>
									<a class="detail" href="/detail?id='.$product->id.'">Detail</a>
								</div>
								<div class="product-content">
									<a href="">	
										<h3 class="title"><a href="#">'.$product->name.'</a></h3>
										<span class="price">'.$product->cost.'</span>
									</a>
								</div>
							</div>
						</div>
					';
				}
			?>
		</div>
	</div><hr>

	<div class="container-fluid bg-dark">
		<div class="row copyright align-self-end">
			<div class="col-xs-4">
				<footer class="text-left">&copy;Copyright 2018 HT ENTE</footer>
			</div>
		</div>
	</div>
	
</body>
</html>