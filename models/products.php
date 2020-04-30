<?php 



class Products 
    {

        private $id;
        private $name;
        private $description;
        private $id_category;
        private $createdAt;
        private $priceHT;
        private $buyPrice;
        private $quantity;
      
  
        

        /** 
         * Get the value of id
         * @return integer
         */ 
        public function getId() : int
        {
                return $this->id;
        }

        /**
         * Get the value of id_category
         */ 
        public function getId_category()
        {
                return $this->id_category;
        }
        


        /**
         * Set the value of id_category
         *
         * @return  self
         */ 
        public function setId_category($id_category)
        {
                $this->id_category = $id_category;

                return $this;
        }


        /**
         * Get the value of createdAt
         */ 
        public function getCreatedAt()
        {
                return $this->createdAt;
        }

        

          /**
         * Get the value of name
         * @param string 
         * 
         */ 
        public function getName() : string
        {
                return $this->name;
        }


        /**
         * Set the value of name
         * @return self
         * 
         */ 
        public function setName( string $name) 
        {
                $this->name = $name;

        }


        /**
         * Get the value of description
         * @param text $description
         */ 
        public function getDescription() 
        {
                return $this->description;
        }
       


        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
        

/**
         * Get the value of priceHT
         * @param float
         */ 
        public function getPriceHT() :float
        {
                return $this->priceHT;
        }

        /**
         * Set the value of priceHT
         *
         * @return  self
         */ 
        public function setPriceHT($priceHT)
        {
                $this->priceHT = $priceHT;

                return $this;
        }

        /**
         * Get the value of buyPrice
         * @param float 
         */ 
        public function getBuyPrice() : float
        {
                return $this->buyPrice;
        }

        /**
         * Set the value of buyPrice
         *
         * @return  self
         */ 
        public function setBuyPrice($buyPrice)
        {
                $this->buyPrice = $buyPrice;

                return $this;
        }

        /**
         * Get the value of quantity
         * @param int $quantity
         */ 
        public function getQuantity() : int
        {
                return $this->quantity;
        }

        /**
         * Set the value of quantity
         *
         * @return  self
         */ 
        public function setQuantity($quantity)
        {
                $this->quantity = $quantity;

                return $this;
        }




        /************************************************************************** */

        
        /**
         * ajouter à la base de donnée$id;
         * @return boolean
         */
         public function add() 
         {
                 $bdd = new Database();
                 $bdd-> insertIntoDB("INSERT INTO products  (id_category,`name`,`description`,priceHT,buyPrice,quantity,createdAt) VALUES (?,?,?,?,?,?,NOW())",
                [
                        $this->id_category,
                        $this->name,
                        $this->description,
                        $this->priceHT,
                        $this->buyPrice,
                        $this->quantity
                ]);
                return $bdd->getLastInsertId();
         }

         /**
         * ajouter à la base de donnée
         * @return boolean
         */
         public function edit($id) : bool
         {        
                 $bdd=new Database();
                 return $bdd->modifDB("UPDATE products SET  id_category =? ,`name`=? ,`description` = ?, priceHT =?,buyPrice =?,quantity=? WHERE id = ? ",
                               [ 
                                $this->id_category,
                                $this->name,
                                $this->description,
                                $this->priceHT,
                                $this->buyPrice,
                                $this->quantity,
                                $id
                               ]);
         }


        /**
         * get products by id
         * @return array
         */
        
        public static function getProductsById($id) :array
        {
                

                $bdd=new Database();
                return $bdd->getOneFromDB("SELECT * FROM products WHERE id=?",[$id]);

        }
        /**
         * get products by id
         * @return array
         */
        
        public static function getAllProductsById($id) :array
        {
                

                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM products WHERE id=?",[$id]);

        }

        /**
        * delete de la base de donnée
        * @return bool
        */
        public static function delete($id) :bool
        {
            
            $bdd=new Database();
            return $bdd->modifDB("DELETE FROM products WHERE id= ?",[$id]);
        }

        /**
         * getProductsByCategory
         * @return array
         */
        
        public static function getProductsByCategory($id_category,$productPerPage,$currentPage) :array
        {
              

                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM products WHERE id_category=? ORDER BY id DESC LIMIT $productPerPage OFFSET $currentPage",[$id_category]);

        }

        /**
         * getProductsByName
         * @return array
         */
        public static function getByName($products)
        {
            $bdd=new Database();
            return $bdd->getAllFromDB("SELECT * FROM products WHERE CONCAT(`name`,`description`) LIKE '%".$products."%' ORDER BY id DESC LIMIT 20", 
            []);

        }
        /**
         * getProductsByName
         * @return array
         */
        public static function getAll($productPerPage,$currentPage)
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM products ORDER BY id DESC LIMIT $productPerPage OFFSET $currentPage" ,[]);
        }
        

        /**
         * getProductsByCatalogues
         * @return array
         */
        public static function getProductsByCatalogues($type)
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM products INNER JOIN category ON products.id_category = category.id WHERE category.type = '".$type."' ORDER BY RAND() LIMIT 20" ,[]);
        }
        
        /**
         * getProductsByRandom
         * @return array
         */
        public static function getProductsByRandom($category)
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM products WHERE id_category = ? ORDER BY RAND() LIMIT 3" ,[$category]);
        }
        

        public static function productNumber()
        {
                $bdd =new Database();
                return $bdd->getAllFromDB("SELECT COUNT(*) FROM products",[]);
        }

        public static function productNumberByCategory($id_category)
        {
                $bdd =new Database();
                return $bdd->getAllFromDB("SELECT COUNT(*) FROM products WHERE id_category=?",[$id_category]);
        }










   }





?>