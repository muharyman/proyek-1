<?php
    include('../db2.php');
    // now we have $db to communicate with database
    
    // receive post request
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("select password from admin where username = ?");
    $ready->bind_param('s', $username);
    $ready->execute();
    
    $ready->store_result();
    $ready->bind_result($password_db);
    
    // check whether there is a result or not
    if ($ready->fetch()) {
        if (password_verify($password, $password_db)) {
            
            // Set token in database
            include("../../assets/php/token.php");
            $token = setToken($db, $username);

            // Set admin access info in cookie
            setcookie("username", $username, NULL, '/');
            setcookie("token", $token, NULL, '/');

            // Delete all admin access info which has been expired
            $ready = $db->prepare("delete from admin_access where time < ?");
            $ready->bind_param('s', time());
            $ready->execute();
            
            header('Location: /admin'); // correct login
        }
        else {
            header('Location: /login'); // username and password do not match
        }
    }
    else {
        header('Location: /login'); // the username does not exist in database
    }
?>