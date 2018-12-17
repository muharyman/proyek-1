<?php

include('assets/php/get_url.php');

$request = explode('/', explode('?', uri())[0]);

if ($request[1] == 'about') {
	if ($request[2] == '') {
		include('views/about_us.php');
	}
	else {
		header('Location: /about');
	}
}
else if ($request[1] == 'addproduct') {
	if ($request[2] == '') {
		include('views/add_product.php');
	}
	else {
		header('Location: /addproduct');
	}
}
else if ($request[1] == 'admin') {
	if ($request[2] == '') {
		include('views/admin.php');
	}
	else {
		header('Location: /admin');
	}
}
else if ($request[1] == 'editproduct') {
	if ($request[2] == '') {
		include('views/edit_product.php');
	}
	else {
		header('Location: /products');
	}
}
else if ($request[1] == 'home') {
	if ($request[2] == '') {
		include('views/home.php');
	}
	else {
		header('Location: /home');
	}
}
else if ($request[1] == 'login') {
	if ($request[2] == '') {
		include('views/login.php');
	}
	else {
		header('Location: /login');
	}
}
else if ($request[1] == 'detail') {
	if ($request[2] == '') {
		include('views/product_detail.php');
	}
	else {
		header('Location: /products');
	}
}
else if ($request[1] == 'products') {
	if ($request[2] == '') {
		include('views/products.php');
	}
	else {
		header('Location: /products');
	}
}
else {
	header('Location: /home');
}