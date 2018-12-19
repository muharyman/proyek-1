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
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<div class="login-form">
		<form action="views/admin.php" onsubmit="return validateLoginForm()" method="POST">
            <h2 class=text-center>ADMIN</h2>
			<div class="form-group">
				<input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password" placeholder="Enter password" name="pswd">
			</div>
			<button type="submit" class="btn btn-primary btn-block">LOGIN</button>
		</form>
	</div>
	<script src="assets/js/validation.js"></script>
</body>
</html>