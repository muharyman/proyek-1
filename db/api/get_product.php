<?php
    // return object Product if exist, else return 0
    function getProduct($id) {
        include('db/db.php'); // now we have $db to communicate with database
        include('db/model/Product.php');

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
        $ready = $db->prepare("select * from products where id = ?");
        $ready->bind_param('d', $id);
        $ready->execute();
        
        // Get the result of execution
        $row = $ready->get_result();

        // Check whether the product is exist or not
        if (mysqli_num_rows($row)) {
            $a = $row->fetch_assoc();

            // return an object Product
            return new Product(
                $id,
                $a["name"],
                $a["description"],
                $a["stock"],
                $a["image"],
                $a["time"],
                $a["cost"]
            );
        }
        else {
            return 0;
        }
    }
?>