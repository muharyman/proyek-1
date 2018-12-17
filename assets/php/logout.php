<?php
    include('assets/php/token.php');

    // Get admin access info from cookie
    $username = $_COOKIE["username"];
    $token = $_COOKIE["token"];

    // Delete admin access info from database
    delToken($username, $token);
    
    // Delete admin access info from cookie
    setcookie("username", NULL, NULL, '/');
    setcookie("token", NULL, NULL, '/');

    header("Location: /login");
?>