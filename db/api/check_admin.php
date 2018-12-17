<?php
    include("db/db.php");
    // now we have $db to communicate with database
    
    // use this way when it receives json data (method POST) if not use $_POST
    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data["username"];
    $password = $data["password"];
    
    // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
    $ready = $db->prepare("select password from admin where username = ?");
    $ready->bind_param('s', $username);
    $ready->execute();
    
    // Get the result of execution
    $row = $ready->get_result();
    
    // check whether there is a result or not
    if (mysqli_num_rows($row)) {
        if (password_verify($password, $row->fetch_assoc()["password"])) {
            
            // Set token in database
            include("assets/php/token.php");
            $token = setToken($username);

            // Set admin access info in cookie
            setcookie("username", $username, NULL, '/');
            setcookie("token", $token, NULL, '/');

            echo(1); // correct login
        }
        else {
            echo(2); // username and password do not match
        }
    }
    else {
        echo(0); // the username does not exist in database
    }
?>