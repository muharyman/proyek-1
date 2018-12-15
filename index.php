<?php

include('assets/php/get_url.php');

$request = explode('/', explode('?', uri())[0]);

if ($request[1] == 'admin') {
	if ($request[2] == '') {
		include('views/view_admin.php');
	}
	else if (($request[2] == 'edit') && ($request[3] == '')) {
		include('views/edit_admin.php');
	}
	else if (($request[2] == 'login') && ($request[3] == '')) {
		include('views/login_admin.php');
	}
	else {
		header('Location: /admin');
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
else if ($request[1] == 'product') {
	if ($request[2] == '') {
		include('views/product.php');
	}
	else if (($request[2] == 'search') && ($request[3] == '')) {
		include('views/search_product.php');
	}
	else {
		header('Location: /product');
	}
}
else {
	header('Location: /home');
}