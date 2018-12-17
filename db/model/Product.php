<?php 

    class Product {
        public $id;
        public $name;
        public $description;
        public $stock;
        public $image;
        public $time;

        function __construct($id, $name, $description, $stock, $image, $time) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->stock = $stock;
            $this->image = $image;
            $this->time = $time;
        }
    }

?>