<?php

// Set admin access info in database
function setToken($db, $username) {
    // Generate token
    $token = md5(uniqid(rand(), true));

    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("insert into admin_access (username, token) values (?, ?)");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();
    
    return $token;
}

// Delete admin access info from database
function delToken($db, $username, $token) {
    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("delete from admin_access where username = ? and token = ?");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();

    return 0;
}

?>