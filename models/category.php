<?php 



class Category 
    {

        private $id;
        private $name;
        private $description;
        private $type;
       
      
  
        

        /** 
         * Get the value of id
         * @return integer
         */ 
        public function getId() : int
        {
                return $this->id;
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
                return $this;
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
         * Get the value of type
         * @param string 
         * 
         */ 
        public function getType() : string
        {
                return $this->type;
        }

        /**
         * Set the value of name
         * @return self
         * 
         */ 
        public function setType( string $type) 
        {
                $this->type = $type;
                return $this;
        }
   


        



        
        /**
         * ajouter à la base de donnée
         * @return boolean
         */
         public function add() : bool
         {
                   

                 $bdd = new Database();
                  $bdd-> insertIntoDB("INSERT INTO category  (`name`, `description`,`type`) VALUES (?,?,?)",
                [
                        $this->name,
                        $this->description,
                        $this->type 
                ]);
                return $bdd->getLastInsertId();
         }




        public function edit($id)
        { 

                $bdd=new Database();
                return $bdd->modifDB(" UPDATE category SET `name`=? ,`description` =? , `type`=? WHERE id=?",
                [ 
                        $this->name,
                        $this->description,
                        $this->type,
                        $id
                ]);
        }




        public static function getCategoryById($id)
        {

                $bdd=new Database();
                return $bdd->getOneFromDB("SELECT * FROM category WHERE id=?" ,[$id]);
        }



        public static function getCategoryById_category($id_category)
        {

                $bdd=new Database();
                return $bdd->getOneFromDB("SELECT * FROM category WHERE id=?" ,[$id_category]);
        }



        public static function getAll()
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM category" ,[]);
        }



        /**
         * getbytype
         * @return array
         */
        public static function getByType($type)
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM category WHERE category.type = ?" ,[$type]);
        }
        



        public static function getAllAdmin($categoryPerPage,$currentPage)
        {
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM category ORDER BY id DESC LIMIT $categoryPerPage OFFSET $currentPage" ,[]);
        }




        /**
        * delete de la base de donnée
        * @return bool
        */
        public static function delete($id) :bool
        {

            $bdd=new Database();
            return $bdd->modifDB("DELETE FROM category WHERE id = ?",[$id]);
        }





        public static function getByName($category)
        {
            $bdd=new Database();
            return $bdd->getAllFromDB("SELECT * FROM category WHERE CONCAT(`name`,`type`) LIKE '%".$category."%' ORDER BY id DESC LIMIT 10", 
            []);

        }


        public static function categoryNumber()
        {
                $bdd =new Database();
                return $bdd->getAllFromDB("SELECT COUNT(*) FROM category",[]);
        }







   }





?>