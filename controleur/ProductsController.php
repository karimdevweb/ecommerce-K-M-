<?php 


class ProductsController
{
     public function add()
        {
               $session = new SessionUser();
               if($session->isLogged() && $session->isAdmin())
               {
                  // récupérer la liste de toutes les catégories
                  $categories = Category::getAll();
                  
                  // faire mes test de récupération et insertion du produit
                  if(isset($_POST["add"]))
                  {
                     if(!empty($_POST["name"]) &&  !empty($_POST["description"]) &&  !empty($_POST["priceHT"]) &&  !empty($_POST["buyPrice"]) && !empty($_POST["quantity"]) && !empty($_POST["id_category"]))
                     {
                        $name = htmlentities( $_POST["name"]);
                        $description = htmlentities($_POST["description"]);
                        $priceHT = htmlentities($_POST["priceHT"]);
                        $buyPrice = htmlentities($_POST["buyPrice"]);
                        $quantity = htmlentities($_POST["quantity"]);
                        $id_category = htmlentities($_POST["id_category"]);

                        $product =new Products();
                        $product->setName($name);
                        $product->setDescription($description);
                        $product->setPriceHT($priceHT);
                        $product->setBuyPrice($buyPrice);
                        $product->setQuantity($quantity);
                        $product->setId_category($id_category);
                        
                        // récupérer le lastInsertId en  même temps 
                        $id =  $product->add();
                        
                        
                        for($i=0;$i<count($_FILES["image_uploads"]['name']);$i++)
                        {
                                 $image= new Image();
                                 $image->addImage($id,$i);
                                 
                        }

                           $flash =new SessionFlash();
                           $flash->success("l'ajout a bien été effectué");

                        header("Location: " .$_SERVER["HTTP_REFERER"]);
                     }else{
                              $flash =new SessionFlash();
                              $flash->error("n'oubliez pas de remplir tout les champs , sûrtout les images !");

                           }
                     
                  }

                  // faire l'appel à la vue 
                  require "views/admin/product/add_product_view.php";
               }else
               {
                  $flash =new SessionFlash();
                  $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                  header("Location: index.php?class=user&action=register");
               }

         }
    /* ******************************************* */

    public function edit()
        {
            $session = new SessionUser();
            if($session->isLogged() && $session->isAdmin())
               {
                  

                     // récupérer la liste de toutes les catégories
                     $categories = Category::getAll();
                     $id = htmlentities($_GET["id"]) ;
                     
                     $oneproduct = Products::getProductsById($id);
                     $catName= Category::getCategoryById_category($oneproduct["id_category"]);
                     $images=Image::getByIdProduct($id);

                  if(isset($_POST["edit"]))
                     {   
                        if(!empty($_POST["name"]) && !empty($_POST["priceHT"])  && !empty($_POST["description"]) && !empty($_POST["buyPrice"]) && !empty($_POST["quantity"]) && !empty($_POST["id_category"]))
                           {
                              $name = htmlentities( $_POST["name"]);
                              $description = htmlentities($_POST["description"]);
                              $priceHT = htmlentities($_POST["priceHT"]);
                              $buyPrice = htmlentities($_POST["buyPrice"]);
                              $quantity = htmlentities($_POST["quantity"]);
                              $id_category = htmlentities($_POST["id_category"]);
                              $id_product = htmlentities($_GET["id"]) ;


                              $product =new Products();
                              $product->setName($name);
                              $product->setDescription($description);
                              $product->setPriceHT($priceHT);
                              $product->setBuyPrice($buyPrice);
                              $product->setQuantity($quantity);
                              $product->setId_category($id_category);
                              
                             
                              $product->edit($id_product);


                              for($i=0; $i<count($_FILES["image_uploads"]["name"]); $i++)
                              {
                                  $image= new Image();
                                  $image->addImage($id_product,$i);
                              }


                              $flash =new SessionFlash();
                              $flash->success("la modification a bien été effectuée");

                           header("Location: ".$_SERVER["HTTP_REFERER"]);

                           }else{
                                    $flash =new SessionFlash();
                                    $flash->error("n'oubliez pas de remplir tout les champs , sûrtout les images !");
                              }
                        }
                       // faire l'appel à la vue de modif  
                require "views/admin/product/update_product_view.php";
                     
              }else
              {
                  $flash =new SessionFlash();
                  $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                  header("Location: index.php?class=user&action=register");
              }

        }





/* *************************************** */
      
    public function list()
    {
        $session = new SessionUser();
        if($session->isLogged() && $session->isAdmin())
        {
            if(isset($_POST["search_product"]))
            {

                if(!empty($_POST["search_product"]))
                    {
                        $totalPages="";
                        $product= htmlentities($_POST["search_product"]);
                        $categories =Category::getAll();
                        $products = Products::getByName($product);
                        
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("veuillez entrer un mot ou phrase à chercher , merci! ");
                        header("Location: index.php?class=products&action=list");
                    }
            }else
                {
                   if(isset($_GET["category"]) && !empty($_GET["category"]) && intval($_GET["category"]))
                   {                        
                     $id_category =htmlentities($_GET["category"]);
                        if(isset($_GET["per_category"])  && $_GET["per_category"] > 0 )
                        {
                           if(!empty($_GET["per_category"]))
                           {
                              $page=htmlentities($_GET["per_category"]);
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
                        $productPerPage= 3;
                        $currentPage = ($thisPage -1)* $productPerPage;
                           // récupérer la liste de toutes les catégories
                        $categories =Category::getAll();
                        $products = Products::getProductsByCategory($id_category,$productPerPage,$currentPage);
                        $productNumber= Products::productNumberByCategory($id_category);
                        $totalPages =ceil($productNumber[0][0] / $productPerPage);
                    }else
                     { 
                           if(isset($_GET["page"])  && $_GET["page"] > 0 )
                           {
                              if(!empty($_GET["page"]))
                              {
                                 $page=htmlentities($_GET["page"]);
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
                           $productPerPage= 15;
                           $currentPage = ($thisPage -1)* $productPerPage;
                              // récupérer la liste de toutes les catégories
                           $categories =Category::getAll();
                           $products = Products::getAll($productPerPage,$currentPage);
                           $productNumber= Products::productNumber();
                           $totalPages =ceil($productNumber[0][0] / $productPerPage);

                     }
                   
                     
                }
                require "views/admin/product/productsList_view.php";
        }else
        {
            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
        
    } 




/******************************************/
    public function delete()
    {
      $session = new SessionUser();
      if($session->isLogged() && $session->isAdmin())
      {
            // supprimer un produit
            if($_GET["id"])
            { 
            $id =htmlentities($_GET["id"]);
            $product = Products::delete($id);

            $flash =new SessionFlash();
            $flash->success("la supprission a bien été effectuée");

            header("Location: ".$_SERVER["HTTP_REFERER"]);
            }else
            {
               $flash =new SessionFlash();
               $flash->error("une erreur es  survenue , veuillez réessayer");
            }

      }else
        {
            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
    }





/*******************************************************************/
 
   public function deleteImage()
   {
         $session = new SessionUser();
         if($session->isLogged() && $session->isAdmin())
         {
               $id=htmlentities($_GET["id"]);
               $image=Image::delete($id);

               $flash= new SessionFlash();
               $flash->success("la suppression a bien été effectuée, merci !");

               header("Location: ".$_SERVER["HTTP_REFERER"]);

         }else
         {
               $flash =new SessionFlash();
               $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
               header("Location: index.php?class=user&action=register");
         }
   }



















     
}




?>