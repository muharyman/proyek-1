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
        <div class="container1">            
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <a class="navbar-brand" href="#">
                    <img src="../assets/images/contoh.gif" alt="logo" style="width:40px;">
                </a>
                <a class="navbar-brand" href="#">HT ENTE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-end col-12 text-center">
                        <li class="nav-item active col-2">
                            <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item col-2">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item col-2">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="add-form">
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1>ADD PRODUCT</h1></div>
            </div>
            <form class="form" action="db/api/post_product.php" method="post" id="addForm" enctype="multipart/form-data">
                <div class="row">    
                    <div class="col-sm-3"><!--left col-->
                        <div class="text-center">
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6>Upload a different photo...</h6>
                            <input type="file" name="image" id="image" class="text-center center-block file-upload required">
                        </div>
                    </div><br><!--col-sm-3-->
                    <div class="col-sm-9">
                        <hr>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="product_name"><h4>Nama Produk</h4></label>
                                <input type="text" class="form-control" name="name" id="product_name" placeholder="Nama Produk required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="harga_sewa"><h4>Harga Sewa</h4></label>
                                <input type="text" class="form-control" name="cost" id="harga_sewa" placeholder="harga sewa required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="stok_barang"><h4>Stok Barang</h4></label>
                                <input type="text" class="form-control" name="stock" id="stok required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="deskripsi"><h4>Deskripsi</h4></label>
                                <input type="textarea" class="form-control" name="description" id="deskripsi required">
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    <button class="btn btn-lg btn-success" type="submit" name="submit"><i class="glyphicon glyphicon-ok-sign"></i> ADD</button>
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