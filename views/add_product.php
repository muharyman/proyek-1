<?php
    include('assets/php/checkauth.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>HT ENTE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/add_product.css">
</head>
<body>
    <header>
		<div class="container-fluid">            
			<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
				<!--LOGO-->
				<a class="navbar-brand" href="/admin">
					<img src="../assets/images/contoh.gif" alt="logo" style="width:40px;">
				</a>
				<a class="navbar-brand" href="/admin">HT ENTE</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-end col-8 text-center">
						<li class="nav-item col-2">
							<a class="nav-link " href="/home">Home</a>
						</li>
						<li class="nav-item active  col-2">
							<a class="nav-link" href="/products">Product<span class="sr-only">(current)</span></a>
						</li>
					</ul>

					<form action="/products" method="post" class="form-inline my-2 mylg-0">
						<input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="search" aria-label="search">
						<button class="btn btn-outline-success" type="submit">search</button>
					</form>
				</div>
			</nav>
		</div>
	</header><br>

    <div class="add-form">
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1>ADD PRODUCT</h1></div>
            </div><hr>
            <form class="form" action="db/api/post_product.php" method="post" id="addForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-3"><!--left col-->
                        <!-- GAMBAR 1 wajib ada 2 dan 3 boleh kosong-->
                        <!--GAMBAR 1-->
                        <div class="text-left">
                            <h6>Upload Gambar 1</h6>
                            <input type="file" name="image1" class="text-center center-block file-upload">
                        </div><br>
                        <!--GAMBAR 2-->
                        <div class="text-left">
                            <h6>Upload Gambar 2</h6>
                            <input type="file" name="image2" class="text-center center-block file-upload">
                        </div><br>
                        <!--GAMBAR 3-->
                        <div class="text-left">
                            <h6>Upload Gambar 3</h6>
                            <input type="file" name="image3" class="text-center center-block file-upload">
                        </div>
                    </div><br><!--col-sm-3-->
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="product_name"><h4>Nama Produk</h4></label>
                                <input type="text" class="form-control" name="name" id="product_name" placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="harga_sewa"><h4>Harga Sewa</h4></label>
                                <input type="text" class="form-control" name="cost" id="harga_sewa" placeholder="harga sewa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="deskripsi"><h4>Spesifikasi</h4></label>
                                <textarea name="description" class="form-control" id="description" style="resize: none" rows="5" cols="55"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> CANCEL</button>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> ADD</button>
                                </div>
                        </div>
                    </div><!--col-sm-9-->
                </div><!--row-->
            </form>
        </div>
	</div>
	<script src=""></script>
</body>
</html>