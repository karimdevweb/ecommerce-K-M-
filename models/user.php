<?php 

 
    class User
    {
        private $id;
        private $email;
        private $password;
        private $address;
        private $firstName;
        private $lastName;
        private $createdAt;
        private $activated;
        private $role;

        


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

         /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }


        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
                return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

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
         * Get the value of activated
         */ 
        public function getActivated()
        {
                return $this->activated;
        }

        /**
         * Set the value of activated
         *
         * @return  self
         */ 
        public function setActivated($activated)
        {
                $this->activated = $activated;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }





       /**
         * ajouter à la base de donnée
         * @return int
         */
        public function add() : int 
        {
            $bdd = new Database();
            $bdd->insertIntoDB("INSERT INTO user (email, `password`,`address`, firstName, lastName, createdAt,activated,`role`) VALUES (?,?,?,?,?,NOW(),?,?)",
            [
                $this->email,
                password_hash($this->password, PASSWORD_BCRYPT),
                $this->address,
                $this->firstName,
                $this->lastName,
                0,
                $this->role,
            ]);
            return $bdd->getLastInsertId();
        }



        /**
         * verifie les informations saisis lors de l'inscription
         *
         * @return bool
         */
        public static function verif()
        {
                $result = true;
                

                if(empty($_POST["email"]) || empty($_POST["confirme_email"])) 
                {    
                        $flash= new SessionFlash();
                        $flash->error("email manquant");
                        $result = false;
                }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                {
                        $flash= new SessionFlash();
                        $flash->error("votre email n'est pas valide, veuillez vériffiez!");
                        $result = false;
                }elseif($_POST["email"] != $_POST["confirme_email"])
                {
                        $flash= new SessionFlash();
                        $flash->error("les émails ne correspondent pas, veuillez vériffiez!");
                        $result = false;
                }else
                {   
                        
                        // if(User::getUserByEmail($_POST["email"]))
                        // {
                        //         $flash= new SessionFlash();
                        //         $flash->error("l'adresse email existe déjà , veuillez vous connectez directement!");
                        //         $result = false;
                        // }else
                        // {

                                if(empty($_POST["address"])) 
                                {
                                        $flash= new SessionFlash();
                                        $flash->error("adresse manquante");
                                        $result = false;
                                }
                                if(empty($_POST["firstName"])) 
                                {
                                        $flash= new SessionFlash();
                                        $flash->error("firstname manquant");
                                        $result = false;
                                } 
                                if(empty($_POST["lastName"])) 
                                {
                                        $flash= new SessionFlash();
                                        $flash->error("lastname manquant");
                                        $result = false;
                                }
                                if(empty($_POST["password"]) || empty($_POST["confirme_password"])) 
                                {
                                        $flash= new SessionFlash();
                                        $flash->error("password manquant");
                                        $result = false;
                                }else{
                                        if(strlen($_POST["password"])< 8 || strlen($_POST["confirme_password"])< 8  )
                                        {
                                                $flash= new SessionFlash();
                                                $flash->error("password trop court");
                                                $result = false;
                                        }else{
                                                
                                                $num =0;
                                                $char = 0;

                                                for($i = 0; $i< strlen($_POST["password"]); $i++)
                                                {
                                                if(is_numeric($_POST["password"][$i]))
                                                {
                                                        $num++;
                                                }
                                                if(is_string($_POST["password"][$i]))
                                                {
                                                        $char++;
                                                }
                                                }
                                                if($num <2 )
                                                {
                                                        $flash= new SessionFlash();
                                                        $flash->error("vous devez saisir au moins 2 chiffres");
                                                        $result = false;
                                                }
                                                if($char <2 )
                                                {
                                                        $flash= new SessionFlash();
                                                        $flash->error("vous devez saisir au moins 2 caractères");
                                                        $result = false;
                                                }
                                                if($_POST["password"] !== $_POST["confirme_password"] )
                                                {
                                                        $flash= new SessionFlash();
                                                        $flash->error("vos mots de passes ne correspondent pas , veuillez vérifier, merci!");
                                                        $result = false;
                                                }
                                        }
                                }
                        //}
                }
                return $result;
        }


        /**
         * verifie les informations saisis lors de l'inscription
         *
         * @return bool
         */
     public static function verifEditPassword()
        {
                $result= true;
                if(!empty($_POST["email"]))
                {
                        if(empty($_POST["password"]) || empty($_POST["confirme_password"])) 
                        {
                                $flash= new SessionFlash();
                                $flash->error("password manquant");
                                $result = false;
                        }else{
                                if(strlen($_POST["password"])< 8 || strlen($_POST["confirme_password"])< 8  )
                                {
                                        $flash= new SessionFlash();
                                        $flash->error("password trop court");
                                        $result = false;
                                }else{
                                        
                                        $num =0;
                                        $char = 0;
                
                                        for($i = 0; $i< strlen($_POST["password"]); $i++)
                                        {
                                        if(is_numeric($_POST["password"][$i]))
                                        {
                                                $num++;
                                        }
                                        if(is_string($_POST["password"][$i]))
                                        {
                                                $char++;
                                        }
                                        }
                                        if($num <2 )
                                        {
                                                $flash= new SessionFlash();
                                                $flash->error("vous devez saisir au moins 2 chiffres");
                                                $result = false;
                                        }
                                        if($char <2 )
                                        {
                                                $flash= new SessionFlash();
                                                $flash->error("vous devez saisir au moins 2 caractères");
                                                $result = false;
                                        }
                                        if($_POST["password"] !== $_POST["confirme_password"] )
                                        {
                                                $flash= new SessionFlash();
                                                $flash->error("vos mots de passes ne correspondent pas , veuillez vérifier, merci!");
                                                $result = false;
                                        }
                                }
                        }
                }else
                {
                        $flash= new SessionFlash();
                        $flash->error("email manquant");
                        $result = false;
                }
                return $result;
        }



        public static function getUserById($id)
        {
            $bdd= new Database();
            return $bdd->getOneFromDB("SELECT * FROM user WHERE  id=?", 
            [$id]);
        }


        public static function getUserByEmail($email)
        {
            $bdd=new Database();
            return $bdd->getOneFromDB("SELECT * FROM user WHERE email = ?", 
            [$email]);

        }


        public static function getByName($name)
        {
            $bdd=new Database();
            return $bdd->getAllFromDB("SELECT * FROM user WHERE CONCAT(firstName,lastName) LIKE '%".$name."%' ORDER BY id DESC LIMIT 10", 
            []);

        }


        public static function getAllUsers($userPerPage,$currentPage)
        {
           $bdd=new Database();
           return $bdd->getAllFromDB("SELECT * FROM user ORDER BY id DESC LIMIT $userPerPage OFFSET $currentPage", []);
        }


        public function activation($id)
        {
                $bdd =new Database();
                return $bdd->modifDB("UPDATE user SET activated = ? WHERE id=?",
                 [
                     $this->activated,
                     $id
                 ]);
        }


        public function editUser($id)
        {
            $bdd =new Database();
            return $bdd->modifDB("UPDATE user SET email =?, `password`=?,`address` =?, firstName =?, lastName =? WHERE id=?",
             [
                 $this->email,
                 password_hash($this->password,PASSWORD_BCRYPT),
                 $this->address,
                 $this->firstName,
                 $this->lastName,
                 $id

             ]);

        }


        public function editPassword($id)
        {
                $bdd =new Database();
                return $bdd->modifDB("UPDATE user SET `password` = ? WHERE id=?",
                 [
                     password_hash($this->password,PASSWORD_BCRYPT),
                     $id
                 ]);
        }



        public static function userNumber()
        {
                $bdd =new Database();
                return $bdd->getAllFromDB("SELECT COUNT(*) FROM user",[]);
        }



       
    }

















?>