<?php

// Set admin access info in database
function setToken($username) {
    include('db/db.php');
    // now we have $db to communicate with database

    // Generate token
    $token = md5(uniqid(rand(), true));

    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("insert into admin_access (username, token) values (?, ?)");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();
    
    return $token;
}

// Delete admin access info from database
function delToken($username, $token) {
    include('db/db.php');
    // now we have $db to communicate with database

    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("delete from admin_access where username = ? and token = ?");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();

    return 0;
}

?>