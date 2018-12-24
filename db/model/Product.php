<?php 

    class Product {
        public $id;
        public $name;
        public $description;
        public $image1;
        public $image2;
        public $image3;
        public $time;
        public $cost;

        function __construct($id, $name, $description, $image1, $image2, $image3, $time, $cost) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->image = $image1;
            $this->image = $image2;
            $this->image = $image3;
            $this->time = $time;
            $this->cost = $cost;
        }
    }

?>