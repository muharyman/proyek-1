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
            $this->image1 = $image1;
            $this->image2 = $image2;
            $this->image3 = $image3;
            $this->time = $time;
            $this->costx = $cost;

            $temp = strrev((string) $cost);
            $this->cost = strrev(implode('.',(str_split($temp, 3))));
        }
    }

?>