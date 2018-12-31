<?php
    include('../db2.php');

    // Get admin access info from cookie
    $username = $_COOKIE["username"];
    $token = $_COOKIE["token"];

    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("select time from admin_access where username = ? and token = ?");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();

    $ready->store_result();
    $ready->bind_result($time_db);
    
    // check whether there is a result or not
    if ($ready->fetch()) {
        $the_time = $time_db;
        
        if (time() > $the_time) {
            header('Location: /login');
        }
    }
    else {
        header('Location: /login');
    }
?>