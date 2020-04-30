<?php 



class Image 
    {

        private $id;
        private $id_product;
        private $path;
       





        /**
         * Get the value of id
         * @param int $id
         */ 
        public function getId() :int
        {
                return $this->id;
        }

        /**
         * Get the value of id_product
         * @param int $id_product
         */ 
        public function getId_product() :int
        {
                return $this->id_product;
        }

        /**
         * Set the value of id_product
         *
         * @return  self
         */ 
        public function setId_product($id_product)
        {
                $this->id_product = $id_product;

                return $this;
        }

        /**
         * Get the value of path
         * @param string $path
         */ 
        public function getPath() : string
        {
                return $this->path;
        }

        /**
         * Set the value of path
         *
         * @return  self
         */ 
        public function setPath($path)
        {
                $this->path = $path;

                return $this;
        }



        /** ajouter 
         * @return boolean
         * 
         */
        private function add()
        {
            $bdd = new Database();
            $bdd-> insertIntoDB("INSERT INTO `image`  (id_product,`path`) VALUES (?,?)",
           [
                  $this->id_product,
                  $this->path
           ]);
           return $bdd->getLastInsertId();
       }

       /**
        * delete de la base de donnée
        * @return bool
        */
        public static function delete($id_product) :bool
        {
            
            $bdd=new Database();
            return $bdd->modifDB("DELETE FROM `image` WHERE id = ?",[$id_product]);
        }

       /**
        * get by id
        * @return array
        */
        public static function getByIdProduct($id_product) :array
        {
            
                $bdd=new Database();
                return $bdd->getAllFromDB("SELECT * FROM `image` WHERE id_product =?",[$id_product]);
        }

        /**
        * get by id_product
        * @return array
        */
        public static function getOneByIdProduct($id_product) : array
        {
            
                $bdd=new Database();
                return $bdd->getOneFromDB("SELECT * FROM `image` WHERE id_product =?",[$id_product]);
        }
        

/* *********************************** */
        public function addImage($id_product,$key)
        {                                   //nom de l'input
                $name =time().basename($_FILES["image_uploads"]["name"][$key]);      
                                                 
                $target_file = "image/" .$name;
                $uploadOk = true;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                // $check = getimagesize($_FILES["image_uploads"]["tmp_name"][$key]);
                // if($check !== false) {
                // $messages[]= "File is an image - " . $check["mime"] . ".";
                // $uploadOk = true;
                // } else {
                // $messages[]= "File is not an image.";
                // $uploadOk = false;
                // }

                // Check if file already exists
                if (file_exists($target_file)) {
                $messages[]= "Sorry, file already exists.";
                $uploadOk = false;
                }
                // Check file size
                if ($_FILES["image_uploads"]["tmp_name"][$key] > 500000) {
                $messages[]= "Sorry, your file is too large.";
                $uploadOk = false;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $messages[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = false;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == false) {
                $messages[]= "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["image_uploads"]["tmp_name"][$key], $target_file)) {
                        
                        $this->setPath(basename( $_FILES["image_uploads"]["name"][$key]));
                        $this->id_product = $id_product;
                        $this->path = $name;
                        
                        $this->add();

                        //resize des images
                        $image = new \Gumlet\ImageResize($target_file);
                        $image->scale(30);
                        $image->save("image/mini/".$name);
                } else 
                        {
                        $messages[]= "Sorry, there was an error uploading your file.";
                        }
                }
        }
   }





?>