<?php 



class OrderDetails 
    {

        private $id;
        private $quantityOrdered;
        private $id_order;
        private $id_product;
        private $priceEach;
      

        /**
         * Get the value of id
         * @return integer
         */ 
        public function getId() :int
        {
                return $this->id;
        }

        
        
        /**
         * Get the value of quantityOrdered
         * @return integer
         */ 
        public function getQuantityOrdered() :int
        {
                return $this->quantityOrdered;
        }

        /**
         * Set the value of quantityOrdered
         *
         * @return  self
         * 
         */ 
        public function setQuantityOrdered($quantityOrdered) 
        {
                $this->quantityOrdered = $quantityOrdered;

                return $this;
        }

        /**
         * Get the value of idOrder
         * @return integer
         */ 
        public function getIdOrder() : int 
        {
                return $this->id_order;
        }

        /**
         * Set the value of idOrder
         *
         * @return  self
         */ 
        public function setIdOrder($id_order) 
        {
                $this->id_order = $id_order;

                return $this;
        }

        /**
         * Get the value of idProduct
         */ 
        public function getIdProduct() : int
        {
                return $this->id_product;
        }

        /**
         * Set the value of idProduct
         *
         * @return  self
         */ 
        public function setIdProduct($id_product)
        {
                $this->id_product = $id_product;

                return $this;
        }

        /**
         * Get the value of priceEach
         */ 
        public function getPriceEach() : float
        {
                return $this->priceEach;
        }

        /**
         * Set the value of priceEach
         *
         * @return  self
         */ 
        public function setPriceEach($priceEach)
        {
                $this->priceEach = $priceEach;

                return $this;
        }
        

        /**
         * ajouter à la base de donnée
         * @return boolean
         */
         public function add(): bool
         {
                 $bdd = new Database();
                $bdd-> insertIntoDB("INSERT INTO orderdetails  (quantityOrdered, id_product,id_order, priceEach) VALUES (?,?,?,?)",
                [
                    $this->quantityOrdered,
                    $this->id_product,
                    $this->id_order,
                    $this->priceEach
                ]);
                return $bdd->getLastInsertId();
         }


        public static function getOrderDetailsbyIdOrder($id_order)
        {

                $bdd = new Database();
                return $bdd-> getAllFromDB("SELECT * FROM orderdetails WHERE id_order=?",[$id_order]);

        }

        
   }





?>