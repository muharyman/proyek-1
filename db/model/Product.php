<?php 

    class Product {
        public $id;
        public $name;
        public $description;
        public $stock;
        public $image;
        public $time;
        public $cost;

        function __construct($id, $name, $description, $stock, $image, $time, $cost) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->stock = $stock;
            $this->image = $image;
            $this->time = $time;
            $this->cost = $cost;
        }
    }

?>