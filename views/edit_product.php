<?php
    include('assets/php/checkauth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>HT ENTE</title>
	<meta charset="utf-8">
    <link rel="icon" href="../assets/images/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/add_product.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
</head>
<body>
<header>
		<div class="container-fluid">            
			<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
				<!--LOGO-->
				<a class="navbar-brand" href="/admin">
					<img src="../assets/images/logo.png" alt="logo" style="width:40px;">
				</a>
				<a class="navbar-brand" href="/admin"><strong>HT ENTE</strong></a>
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

					<form action="/search" method="post" class="form-inline my-2 mylg-0">
						<input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="search" aria-label="search">
						<button class="btn btn-outline-success" type="submit" name="submit">search</button>
					</form>
				</div>
			</nav>
		</div>
	</header><br>

<div class="content">
    <div class="add-form">
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1><b>EDIT PRODUCT</b></h1></div>
            </div><hr>
            <?php
                include('db/api/get_product.php');

                // Get and check get request (id)
                $id = (int)$_GET["id"];
                if ($id) {
                    $product = getProduct($id);
                }
                else {
                    $product = getProduct(1);
                }
                
                // Check if the product with given id is exist
                if ($product) {
                    echo '
                        <form class="form" action="db/api/update_product.php" method="post" id="addForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-3"><!--left col-->
                                    <!-- GAMBAR 1 wajib ada 2 dan 3 boleh kosong-->
                                    <!--GAMBAR 1-->
                                    <div class="text-left">
                                        <img src="'.$product->image1.'" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="image1" class="text-center center-block file-upload">
                                    </div><br>
                                    <!--GAMBAR 2-->
                                    <div class="text-left">
                                        <img src="'.$product->image2.'" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="image2" class="text-center center-block file-upload">
                                    </div><br>
                                    <!--GAMBAR 3-->
                                    <div class="text-left">
                                        <img src="'.$product->image3.'" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="image3" class="text-center center-block file-upload">
                                    </div>
                                </div><br><!--col-sm-3-->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="product_name"><h4>Nama Produk</h4></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Produk" value="'.$product->name.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="harga_sewa"><h4>Harga Sewa</h4></label>
                                            <input type="text" class="form-control" name="cost" id="harga_sewa" placeholder="harga sewa" value="'.$product->cost.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="deskripsi"><h4>Spesifikasi</h4></label>
                                            <textarea name="description" class="form-control" id="deskripsi" style="resize: none" rows="5" cols="55">'.$product->description.'</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <!-- Menuju ke Produk-->
                                                <button class="btn btn-lg" type="reset" onclick="location.href=\'/admin\'"><i class="glyphicon glyphicon-repeat"></i>CANCEL</button>
                                                <!--Menuju ke Produk Detail -->
                                                <button class="btn btn-lg btn-success" name="submit" type="submit" value="'.$_GET["id"].'"><i class="glyphicon glyphicon-ok-sign"></i> SAVE</button>
                                            </div>
                                    </div>
                                </div><!--col-sm-9-->
                            </div><!--row--> 
                        </form>
                    ';
                }
                else {
                    //header('Location: /products');
                }
            ?>
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