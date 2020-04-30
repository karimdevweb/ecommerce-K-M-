<?php




class UserController 
{
    public function index()
    {

        $session = new SessionUser();
       

        if($session->isLogged())
        {   
            
            if($session->isLoggedWithRole("admin"))
            {
                require "views/admin/admin_dashboard_view.php";
               
            }elseif($session->isLoggedWithRole("client"))
            {
                $user= User::getUserById($_SESSION["user"]["id"]);
                require "views/client/client_dashboard.php";

            }else{
                    $flash =new SessionFlash();
                    $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                    header("Location: index.php?class=user&action=register");
                } 
            
        }else{

            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
    }




/*****************************************************************************/
  
    public function register()
    {
        if(isset($_POST["inscription"]))
        {
            if(!empty($_POST["recaptcha_response"]))
            {
                $url= "https://www.google.com/recaptcha/api/siteverify?secret=".KEY['secret']."&response={$_POST["recaptcha_response"]}";

                if(function_exists("curl_version"))
                {
                    $curl= curl_init($url);
                    curl_setopt($curl,CURLOPT_HEADER,false);
                    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($curl,CURLOPT_TIMEOUT,1);
                    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                    $response = curl_exec($curl);
                }else
                {
                       $response= file_get_contents($url);
                }
                if(!empty($response) && !is_null($response))
                {
                    $data=json_decode($response);
                    if($data->success)
                    {
                        $email =htmlentities($_POST["email"]);
                        $confirme_email =htmlentities($_POST["confirme_email"]);
                        $password =htmlentities($_POST["password"]);
                        $confirme_password =htmlentities($_POST["confirme_password"]);
                        $address =htmlentities($_POST["address"]);
                        $firstName =htmlentities($_POST["firstName"]);
                        $lastName =htmlentities($_POST["lastName"]);
                    
                        $verif = User::verif(
                            $email,
                            $confirme_email,
                            $password,
                            $confirme_password,
                            $address,
                            $firstName,
                            $lastName
                        );
        
                        if($verif)
                        {
                            $user = new User();
                            $user->setEmail($email);
                            $user->setPassword($password);
                            $user->setAddress($address);
                            $user->setFirstName($firstName);
                            $user->setLastName($lastName);
                            $user->setRole("client");
        
        
                            $user_id=$user->add();
        
                            if( $user_id !=0 )
                            {
                                $subject= "confirmation du compte";
                                $sendTo= $user->getEmail();
                                $sendFrom= "karimdevweb@gmail.com";
                                $content= "merci pour votre inscription , veuillez suivre les instruction ci-après. \n \n <a href='http://".SERVER['host'].SERVER['folder']."/index.php?class=user&action=confirm&id=$user_id' > Cliquez ICI</a> afin de confirmer la création de votre compte , merci." ;
                            
                                $mail = new OurMailer();
                                $mail->sendMail($subject,$sendTo,$sendFrom,$content);
                            
                                $flash =new SessionFlash();
                                $flash->information("un email de confirmation vient de vous être envoyé, veuillez confirmez !");
                            }else
                            {
                                $flash =new SessionFlash();
                                $flash->warning("une erreur c'est produite, veuillez réessayer !");
                            }
                        }
                    }else
                    {
                         $flash =new SessionFlash();
                         $flash->error("veuillez rafraichir la page , merci !");
                         header("Location: index.php?class=user&action=register");
                    }
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("veuillez rafraichir la page , merci !");
                    header("Location: index.php?class=user&action=register");
                }

                

            }else
            {
                $flash =new SessionFlash();
                $flash->error("veuillez rafraichir la page , merci !");
                header("Location: index.php?class=user&action=register");
            }
            
        }
        require "views/front/user/inscription_view.php";
    }


/*****************************************************************************/
    public function confirm()
    {
       
        if(isset($_GET["id"]) &&  !empty($_GET["id"]))
        {   
            $id= htmlentities($_GET["id"]);
            $id=intval($id);
            $user = User::getUserById($id);
            if($user)
            {
                $flash =new SessionFlash();
                if($user["activated"] == 0)
                { 
                  
                    $userActivation = new User();
                    $userActivation->setActivated(1);
                    $userActivation->activation($id);
                
                    
                    
                    $flash->success("votre compte a bien été validé, vous pouvez vous connecter.<a href=index.php?class=user&action=login> cliquez-ici </a>");    
               }else
                 {
                     
                     $flash->error("votre inscription a déjà été confirmé , vous pouvez vous connecté, merci!");
                 } 
            }else 
                {
                    
                    http_response_code(404);
                    header("Location: index.php?class=front&action=pageNotFound");
                }
        }
        require "views/front/user/account_activation_view.php";
    }


/*****************************************************************************/
    public function login()
    {
        $session = new SessionUser();
        
        if($session->isLogged())
        {
                header("Location: index.php?class=user&action=index");

        }elseif(!isset($_SESSION["logged"]) || !$_SESSION["logged"])
        {
            
           if(isset($_POST["login"]))  
           {
                if(!empty($_POST["recaptcha_response"]))
                {
                    $url= "https://www.google.com/recaptcha/api/siteverify?secret=".KEY['secret']."&response={$_POST["recaptcha_response"]}";

                    if(function_exists("curl_version"))
                    {
                        $curl= curl_init($url);
                        curl_setopt($curl,CURLOPT_HEADER,false);
                        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($curl,CURLOPT_TIMEOUT,1);
                        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                        $response = curl_exec($curl);
                    }else
                    {
                        $response= file_get_contents($url);
                    }
                    if(!empty($response) && !is_null($response))
                    {
                        $data=json_decode($response);
                        if($data->success)
                        {
                            $email =htmlentities($_POST["email"]);
                            $password =htmlentities($_POST["password"]);

                         if(!empty($email) && !empty($password))
                            {
                                $user= User::getUserByEmail($email);
                                $flash =new SessionFlash();
                                if($user)
                                {
                                    if(password_verify($password, $user["password"]))
                                    {
                                        if($user["activated"] == 1)
                                        {
                                            $session->login($user);
                                            
                                            $flash->success("vous êtes maintenant connecté");
                                            header("Location: index.php?class=user&action=index");
                                        }else{
                                            $flash->error("pensez à activer votre compte, merci");
                                            header("Location: index.php?class=front&action=login_view");
                                        }
                                        
                                    }else
                                        {
                                            
                                            $flash->warning("revérifiez votre mot de passe");
                                            header("Location: index.php?class=front&action=login_view");
                                        }
                                }else
                                    {
                                        
                                        $flash->warning("Cette adresse email n'existe pas");
                                        header("Location: index.php?class=front&action=login_view");
                                    }
                            }else 
                                {
                                    $flash =new SessionFlash();
                                    $flash->warning("tous les champs doivent être complétés");
                                    header("Location: index.php?class=front&action=login_view");
                                }   
                        }else
                        {
                            $flash =new SessionFlash();
                            $flash->error("3 veuillez rafraichir la page , merci !");
                            header("Location: index.php?class=front&action=login_view");
                        }
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("2 veuillez rafraichir la page , merci !");
                        header("Location: index.php?class=front&action=login_view");
                    }
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error(" 1 veuillez rafraichir la page , merci !");
                    header("Location: index.php?class=front&action=login_view");
                }  
           }
 

        }else
        {   $flash =new SessionFlash();
            $flash->warning("veuillez vous connectez pour accéder à la pgae, merci! ");
            header("Location: index.php?class=front&action=login_view");
        } 
       
    } 





/*****************************************************************************/
    public function logout()
    {
        $session = new SessionUser();
        $session->logout();

        $flash =new SessionFlash();
        $flash->success("vous vous êtes bien déconecté, à bientôt!");

        header("Location: index.php?class=front&action=homePage");
        
    }


/*****************************************************************************/
    public function AllUsers()
    {
        $session = new SessionUser();
        if($session->isLogged() && $session->isAdmin())
        {    $userNumber= User::userNumber();
            if(isset($_POST["search_user"]))
            {
                if(!empty($_POST["search_user"]))
                {
                     $totalPages="";
                    $name= htmlentities($_POST["search_user"]);
                    $users = User::getByName($name);
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("veuillez entrer un nom ou prénom à chercher , merci! ");
                    header("Location: index.php?class=user&action=AllUsers");
                }
            }else
            {
                if(isset($_GET["page"])  && $_GET["page"] > 0 )
                { $page = htmlentities($_GET["page"]);
                    if(!empty($page))
                    {
                        $page=intval($page);
                        $thisPage=$page;
                    }else{
                        $thisPage=1;
                        $flash =new SessionFlash();
                        $flash->error("désolé mais la page que vous cherchez n'existe pas , merci! ");
                    }
                    
                }else{
                    $thisPage=1;
                }
                $userPerPage= 10;
                $currentPage = ($thisPage -1)* $userPerPage;
                $users= User::getAllUsers($userPerPage,$currentPage);
                $userNumber =User::userNumber();
                $totalPages =ceil($userNumber[0][0] / $userPerPage);
            }
            

            require "views/admin/client/admin_client_list.php";
        }else
        {   $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'accéder à cette page , merci! ");
            header("Location: index.php?class=user&action=register");
        } 
       
    }


/********************************************/
    public function oneuser()
    {
        $session = new SessionUser();
        if($session->isLogged() && $session->isAdmin())
        {
            if(isset($_GET["id"]) && !empty($_GET["id"]))
            {
                $id =htmlentities($_GET["id"]);
                $orders = Orders::getOrdersByIdClient($id);
             
                $products=[] ;
                foreach($orders as $order)
                {
                    $products[] =Products::getAllProductsById($order["id_product"]);
                    
                } 
               
            }
                require "views/admin/client/oneuser_view.php";
        }else
        {
            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
    }



/*****************************************************************************/
    public function editPassword()
    { 
        if(isset($_POST["email"]) && !empty($_POST["email"]))
        {
            if(!empty($_POST["recaptcha_response"]))
            {
                $url= "https://www.google.com/recaptcha/api/siteverify?secret=".KEY['secret']."&response={$_POST["recaptcha_response"]}";

                if(function_exists("curl_version"))
                {
                    $curl= curl_init($url);
                    curl_setopt($curl,CURLOPT_HEADER,false);
                    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($curl,CURLOPT_TIMEOUT,1);
                    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                    $response = curl_exec($curl);
                }else
                {
                    $response= file_get_contents($url);
                }
                if(!empty($response) && !is_null($response))
                {
                    $data=json_decode($response);
                    if($data->success)
                    {
                        $email=htmlentities($_POST["email"]);
                        $user = User::getUserByEmail($email);
                        if($user)
                        { 
                            $email =htmlentities($_POST["email"]);
                            $password =htmlentities($_POST["password"]);
                            $confirme_password =htmlentities($_POST["confirme_password"]);

                            $verif = User::verifEditPassword(
                                $email,
                                $password,
                                $confirme_password,
                            );
                            if($verif)
                            {
                                $newPass= new User();
                                $newPass->setPassword($password);
                                $newPass->editPassword($user["id"]);

                                $flash =new SessionFlash();
                                $flash->success(" votre nouveau  mot de passe a bien été enregistré");
                            }else
                            {
                                $flash =new SessionFlash();
                                $flash->warning("votre mot de passe doit contenir au min 8 caractères, 2 lettres et 2 chiffres!");
                                header("Location: index.php?class=front&action=login_view");
                            }
                        }else
                        {  
                            $flash =new SessionFlash();
                            $flash->warning("Cette adresse email n'existe pas");
                            header("Location: index.php?class=front&action=login_view");
                        } 
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("veuillez revalider le formulaire , merci !");
                        header("Location: index.php?class=front&action=login_view");
                    }
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("veuillez revalider le formulaire , merci !");
                    header("Location: index.php?class=front&action=login_view");
                }
            }else
            {
                $flash =new SessionFlash();
                $flash->error("veuillez revalider le formulaire , merci !");
                header("Location: index.php?class=front&action=login_view");
            }
        }else
        {
            $flash =new SessionFlash();
            $flash->warning("tout les champs doivent être complétés");
            header("Location: index.php?class=front&action=login_view");
        }

       
    }

    

/*****************************************************************************/
    public function profile_view()
    {
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $id =htmlentities($_GET["id"]);
            $user = User::getUserById($id);
        }
     require "views/client/dashboard__modif_client.php"; 
    }


/*****************************************************************************/
    public function editProfile()
    {
        $session = new SessionUser();
        if($session->isLogged())
        {

            $user= User::getUserById($_SESSION["user"]["id"]);
            
            if(isset($_POST["edit"]))
            { 
                $email =htmlentities($_POST["email"]);
                $confirme_email =htmlentities($_POST["confirme_email"]);
                $password =htmlentities($_POST["password"]);
                $confirme_password =htmlentities($_POST["confirme_password"]);
                $address =htmlentities($_POST["address"]);
                $firstName =htmlentities($_POST["firstName"]);
                $lastName =htmlentities($_POST["lastName"]);

                    $verif = User::verif(
                        $email,
                        $confirme_email,
                        $password,
                        $confirme_password,
                        $address,
                        $firstName,
                        $lastName
                     );
                
                    if ($verif)
                    {
                        $updateUser= new User();
                        $updateUser->setLastName($lastName)
                                    ->setFirstName($firstName)
                                    ->setEmail($email)
                                    ->setPassword($password)
                                    ->setAddress($address);
            
                        $updateUser->editUser($user["id"]);
                        
                        $flash= new SessionFlash();
                        $flash->success("vos coordonnées ont bien été mis à jour, merci");
                        header("Location: index.php?class=user&action=index");
            
                    }else
                    {
                        $flash= new SessionFlash();
                        $flash->error("coordonées invalides ");
                        header("Location: index.php?class=user&action=index");
                        
                    }
            }
           
        }else
        {
            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
    }
    




/****************** historique **************************/
public function historique()
{
    $session = new SessionUser();
    if($session->isLogged())
    {
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $id =htmlentities($_GET["id"]);
            $orders = Orders::getOrdersByIdClient($id);
         
            $products=[] ;
            
            foreach($orders as $order)
            {
                $products[] =Products::getAllProductsById($order["id_product"]);
                
            } 
           
        }  
            require "views/client/historique.php";
    }else
    {
        $flash =new SessionFlash();
        $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
        header("Location: index.php?class=user&action=register");
    }
    
}



/**************************** in contact page *********************************************/

    public function emailingToAdmin()
    {
        if(isset($_POST["send"]))
        {
            if(!empty($_POST["recaptcha_response"]))
            {
                $url= "https://www.google.com/recaptcha/api/siteverify?secret=".KEY['secret']."&response={$_POST["recaptcha_response"]}";

                if(function_exists("curl_version"))
                {
                    $curl= curl_init($url);
                    curl_setopt($curl,CURLOPT_HEADER,false);
                    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($curl,CURLOPT_TIMEOUT,1);
                    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                    $response = curl_exec($curl);
                }else
                {
                    $response= file_get_contents($url);
                }
                if(!empty($response) && !is_null($response))
                {
                    $data=json_decode($response);
                    if($data->success)
                    {
                        $email =htmlentities($_POST["email"]);
                        $content =htmlentities($_POST["message"]);

                            if(!empty($email) && !empty($content))
                            {

                                $subject= htmlentities($_POST["subject"]);
                                $sendTo= "sondageforgeld@gmail.com";
                                $sendFrom= htmlentities($_POST["email"]);
                                $content= "sendFrom : ".htmlentities($_POST["email"])."<br><br>".htmlentities($_POST["message"]) ;
                            
                                $mail = new OurMailer();
                                $mail->sendMail($subject,$sendTo,$sendFrom,$content);

                                $flash =new SessionFlash();
                                $flash->success("votre message a bien été envoyé, merci. ");
                                header("Location: index.php?class=front&action=contact");

                            }else
                                {
                                    $flash =new SessionFlash();
                                    $flash->error("véillez à ce que tout les champs soient remplis, merci");
                                    header("Location: index.php?class=front&action=contact");
                                }
                        }else
                        {
                            $flash =new SessionFlash();
                            $flash->error("veuillez rafraichir la page , merci !");
                            header("Location: index.php?class=front&action=contact");
                        }
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("veuillez rafraichir la page , merci !");
                        header("Location: index.php?class=front&action=contact");
                    }
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("veuillez rafraichir la page , merci !");
                    header("Location: index.php?class=front&action=contact");
                }
        }

    }



/*************************** in AdminDashboard **************************************************/

    public function emailingToclient()
    {
          $session = new SessionUser();
            if($session->isLogged() && $session->isAdmin())
            {
                if(isset($_POST["send"]))
                {
                    $email=htmlentities($_POST["email"]);
                    $content=htmlentities($_POST["message"]);

                    if(!empty($email) && !empty($content))
                    {

                        $subject= htmlentities($_POST["subject"]);
                        $sendTo= htmlentities($_POST["email"]);
                        $sendFrom= "karimdevweb@gmail.com";
                        $content= htmlentities($_POST["message"]) ;
                     
                        $mail = new OurMailer();
                        $mail->sendMail($subject,$sendTo,$sendFrom,$content);

                        $flash =new SessionFlash();
                        $flash->success("votre message a bien été envoyé, merci. ");
                        header("Location: index.php?class=user&action=Allusers");
        
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("véillez à ce que tout les champs soient remplis, merci");
                        header("Location: index.php?class=user&action=Allusers");
                    }

                }
            }
       
            
    }




/**************************** in ClientDashboard *************************************************/

public function clientEmailing()
{
      $session = new SessionUser();
        if($session->isLogged() && $session->isClient())
        {
            if(isset($_POST["send"]))
            {
                $email=htmlentities($_POST["email"]);
                $content=htmlentities($_POST["message"]);

                if(!empty($email) && !empty($content))
                {

                    $subject= htmlentities($_POST["subject"]);
                    $sendTo= "karimdevweb@gmail.com";
                    $sendFrom= htmlentities($_POST["email"]);
                    $content= "sendFrom : ".htmlentities($_POST["email"])."<br><br>".htmlentities($_POST["message"]) ;
                 
                    $mail = new OurMailer();
                    $mail->sendMail($subject,$sendTo,$sendFrom,$content);

                    $flash =new SessionFlash();
                    $flash->success("votre message a bien été envoyé, merci. ");
                    header("Location: index.php?class=user&action=index");
    
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("véillez à ce que tout les champs soient remplis, merci");
                   header("Location: index.php?class=user&action=index");
                }

            }
        }
   
        
}


    


/*****************************************************************************/
    public function newsLetter()
    {
            if(isset($_POST["send"]))
            {
                if(!empty($_POST["email"]))
                {  $email=htmlentities($_POST["email"]);

                    $newsLetter ="newsLetter.pdf";
                    
                   if($newsLetter)
                   {
                        $subject="merci, d'avoir demander notre newsletter" ;
                        $sendTo= $email;
                        $sendFrom= "karimdevweb@gmail.com";
                        $content=" <html><div> comme souhaité, ci-joint vous trouverez notre récente newsletter , bonne lecture ;</div><a href=localhost/phpsite/ecommerce/image/".$newsLetter." target=_blank>".$newsLetter."</a></html>";
                        $mail = new OurMailer();
                        $mail->sendMail($subject,$sendTo,$sendFrom,$content);

                        $flash =new SessionFlash();
                        $flash->success("vous receverez sous peu un exepmlaire de la newsLetter, en vous remerçiant. ");
                        header("Location: ".$_SERVER["HTTP_REFERER"]);
                   }else
                   {
                        $flash =new SessionFlash();
                        $flash->error("désolé ,  veuilez réessayer ultérieurement, merci de votre compréhension");
                        header("Location: ".$_SERVER["HTTP_REFERER"]);
                   }
                    
    
                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("indiquez votre adreese mail, merci");
                    header("Location: ".$_SERVER["HTTP_REFERER"]);
                }

            }
           
    }

    
    














}













