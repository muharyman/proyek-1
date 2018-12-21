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
                <div class="col-sm-10"><h1>EDIT PRODUCT</h1></div>
            </div>
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
                                    <div class="text-center">
                                        <img src="'.$product->image.'" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload a different photo...</h6>
                                        <input type="file" name="image" class="text-center center-block file-upload">
                                    </div>
                                </div><br><!--col-sm-3-->
                                <div class="col-sm-9">
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="product_name"><h4>Nama Produk</h4></label>
                                            <input type="text" class="form-control" value="'.$product->name.'" name="name" id="product_name" placeholder="Nama Produk">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="harga_sewa"><h4>Harga Sewa</h4></label>
                                            <input type="text" class="form-control" value="'.$product->cost.'" name="cost" id="harga_sewa" placeholder="harga sewa">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="stok_barang"><h4>Stok Barang</h4></label>
                                            <input type="text" class="form-control" value="'.$product->stock.'" name="stock" id="stok">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="deskripsi"><h4>Deskripsi</h4></label>
                                            <input type="textarea" class="form-control" value="'.$product->description.'" name="description" id="deskripsi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> CANCEL</button>
                                                <button class="btn btn-lg btn-success" name="submit" value='.$product->id.' type="submit"><i class="glyphicon glyphicon-ok-sign"></i> EDIT</button>
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
	<script src=""></script>
</body>
</html>