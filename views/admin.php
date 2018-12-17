admin (ada checkauth dulu)
<!-- <?php
    include("db/db.php");
    $a = 'hamdi';
    $ready = $db->prepare("select password from admin where username = ?");
    $ready->bind_param('s', $a);
    $ready->execute();
    
    $row = $ready->get_result();

    echo($row->fetch_assoc()["password"]);
?> -->