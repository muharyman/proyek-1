<?php
    // Check if the username is exist and match the password
    function checkAdmin($username, $password) {
        require("../../db/db.php"); // nanti menyesuaikan aja lokasi dia di-run
        
        $ready = $db->prepare("select password from admin where username = ?");
        $ready->bind_param('s', $username);
        $ready->execute();
        
        $row = $ready->get_result();
        
        if (mysqli_num_rows($row)) {
            if (password_verify($password, $row->fetch_assoc()["password"])) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 0;
        }
    }
?>