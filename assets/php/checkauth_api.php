<?php
    include('../db2.php');

    // Get admin access info from cookie
    $username = $_COOKIE["username"];
    $token = $_COOKIE["token"];

    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("select * from admin_access where username = ? and token = ?");
    $ready->bind_param('ss', $username, $token);
    $ready->execute();

    // Get the result of execution
    $row = $ready->get_result();

    // check whether there is a result or not
    if (mysqli_num_rows($row)) {
        $the_time = $row->fetch_assoc()["time"];
        
        if (time() > $the_time) {
            header('Location: /login');
        }
    }
    else {
        header('Location: /login');
    }
?>