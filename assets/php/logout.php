<?php
    include('assets/php/token.php');
    include('db/db.php');

    // Get admin access info from cookie
    $username = $_COOKIE["username"];
    $token = $_COOKIE["token"];

    // Delete admin access info from database
    delToken($db, $username, $token);
    
    // Delete admin access info from cookie
    setcookie("username", NULL, NULL, '/');
    setcookie("token", NULL, NULL, '/');

    header("Location: /login");
?>