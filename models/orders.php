<?php 



class Orders 
    {

        private $id;
        private $orderDate;
        private $status;
        private $shippedDate;
        private $totalPrice;
        private $id_client;

      
  
        

       






        /**
         * Get the value of id
         * @param integer $id
         */ 
        public function getId() : int
        {
                return $this->id;
        }


        /**
         * Get the value of orderDate
         * @param DateTime $date
         */ 
        public function getOrderDate() : DateTime
        {
                return $this->orderDate;
        }

        /**
         * Set the value of orderDate
         *
         * @return  self
         */ 
        public function setOrderDate($orderDate)
        {
                $this->orderDate = $orderDate;

                return $this;
        }

        /**
         * Get the value of status
         * @param string $status
         */ 
        public function getStatus() : string
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        /**
         * Get the value of shippedDate
         * @param DateTime
         */ 
        public function getShippedDate() :DateTime
        {
                return $this->shippedDate;
        }

        /**
         * Set the value of shippedDate
         *
         * @return  self
         */ 
        public function setShippedDate($shippedDate)
        {
                $this->shippedDate = $shippedDate;

                return $this;
        }

        /**
         * Get the value of totalPrice
         * @param float
         */ 
        public function getTotalPrice() : float
        {
                return $this->totalPrice;
        }

        /**
         * Set the value of totalPrice
         *
         * @return  self
         */ 
        public function setTotalPrice($totalPrice)
        {
                $this->totalPrice = $totalPrice;

                return $this;
        }

        /**
         * Get the value of id_client
         * @param int $id_client
         */ 
        public function getId_client() : int 
        {
                return $this->id_client;
        }

        /**
         * Set the value of id_client
         *
         * @return  self
         */ 
        public function setId_client($id_client)
        {
                $this->id_client = $id_client;

                return $this;
        }

/************************************************************** */

        /**
         * ajouter à la base de donnée$id;
         * 
         */

        public function add($id_client) 
        {      $bdd = new Database();
             $bdd-> insertIntoDB("INSERT INTO orders  (orderDate,`status`,shippedDate,totalPrice,id_client) VALUES (NOW(),?,(NOW() + INTERVAL 1 DAY),?,?) ",
               [
                $this->status,
                $this->totalPrice,
                $id_client
               ]);
               return $bdd->getLastInsertId();
        }

        /**
         * get products by id
         * @return array
         */
        
        public function getOrdersById($id) :array
        {

                $bdd=new Database();
                return $bdd->getOneFromDB("SELECT * FROM products WHERE id=?",[$id]);

        }

        //  /**
        //  * get products by id
        //  * @return array
        //  */
        
        // public static function getOrdersByIdClient($id_client) :array
        // {

        //         $bdd=new Database();
        //         return $bdd->getAllFromDB("SELECT * FROM orders WHERE id_client=?",[$id_client]);

        //}

          /**
         * get products by id
         * @return array
         */
        
        public static function getOrdersByIdClient($id_client) :array
        {

                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM orders INNER JOIN orderDetails ON orders.id = orderDetails.id_order WHERE id_client=?",[$id_client]);

        }

        /**
         * ajouter à la base de donnée
         * @return boolean
         */
        public function editStatus($id) :bool
        {        
                $bdd=new Database();
                return $bdd->modifDB("UPDATE orders SET  `status` =? , shippedDate= ?,totalPrice=? WHERE id =?",
                              [ 
                                $this->status,
                                $this->shippedDate,
                                $this->totalPrice,
                                $id
                              ]);
        }





   }





?>