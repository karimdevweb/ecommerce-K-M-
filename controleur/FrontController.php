<?php




class FrontController 
{


 
    /*****************************************************************************/
    public function HomePage()
    {
      
        require "views/front/index_view.php"; 
    }


     
    /*****************************************************************************/
    public function women_view()
    {
         require "views/front/women_view.php";
    }

    /*****************************************************************************/
    public function men_view()
    {
         require "views/front/men_view.php";
    }

    /*****************************************************************************/
    public function kid_view()
    {
         require "views/front/kid_view.php";
    }

   

   /* *************************************** */
   public function getAllProducts()
   {
       if(isset($_GET["id"]) && !empty($_GET["id"]))
       { 
            if(isset($_GET["page"])  && $_GET["page"] > 0 )
            {
                $page = htmlentities($_GET["page"]);
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

            $productPerPage= 9;
            $id_category = htmlentities($_GET["id"]);
            $type = htmlentities($_GET["type"]);
            $currentPage = ($thisPage -1)* $productPerPage;
            $images=[];
            $products = Products::getProductsByCategory($id_category,$productPerPage,$currentPage);
            $productNumber= Products::productNumberByCategory($id_category);
            $totalPages =ceil($productNumber[0][0] / $productPerPage);
            $category = Category::getCategoryById($id_category);
            $categories =Category::getByType($type);

            foreach ($products as $product)
                {
                    $images[]=Image::getOneByIdProduct($product["id"]);
                } 

            /************************************/
                $sessions = new Sessionfavoris;
                $favoris =[];
                $favoris=$sessions->get();
                
            /***********************************/
            
       }

        require "views/front/product/productsList_view.php";
   }


  /* *************************************** */
    public function search_product()
    {
       
            if(isset($_POST["search_product"]))
            {
                if(!empty($_POST["search_product"]))
                {
                        $totalPages="";
                        $searchProduct = htmlentities($_POST["search_product"]);
                        $products = Products::getByName($searchProduct);
                        $images=[];
                        
                        foreach ($products as $product)
                        {
                            $images[]=Image::getOneByIdProduct($product["id"]);
                        }
                        
                        /************************************/
                            $sessions = new Sessionfavoris;
                            $favoris=$sessions->get();
                          
                        /***********************************/

                }else
                {
                    $flash =new SessionFlash();
                    $flash->error("veuillez entrer un produit à chercher , merci! ");
                    header("Location: ".$_SERVER["HTTP_REFERER"]);
                }
            }

            require "views/front/product/search_view.php";
    }
    
    /*****************************************************************************/

    public function getById()
    {
        // récupérer par l'id
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $id = htmlentities($_GET["id"]);
            $product= Products::getProductsById($id);
            $images=Image::getByIdProduct($id);
            $suggestions = Products::getProductsByRandom($product["id_category"]);
            $imagesSug =[];
            foreach($suggestions as $suggestion)
            {
                $imagesSug [] = Image::getOneByIdProduct($suggestion["id"]);
            }

            
            /************************************/
                $sessions = new Sessionfavoris;
                $favoris =[];
                $favoris=$sessions->get();
               
            /***********************************/


            require "views/front/product/oneproduct_view.php";         
        }
        
   }



/*****************************************************************************/

    public function getByCatalogues()
    {
        if(isset($_GET["searchProduct"]) && isset($_GET["type"]))
        {
            $searchProduct = $_GET["searchProduct"];
            $type = htmlentities($_GET["type"]);
            $products= Products::getProductsByCatalogues($type);
          
            $images =[];
            foreach ($products as $product)
            {
                $images[]=Image::getOneByIdProduct($product[0]);
            }
         
            
            /************************************/
                $sessions = new Sessionfavoris;
                $favoris=$sessions->get();
               
           /***********************************/
           
        }
             require "views/front/product/search_view.php";
    }




    /*****************************************************************************/
    public function contact()
    {
        require "views/front/user/contact_view.php"; 
    }

    /*****************************************************************************/
    public function pageNotFound()
    {
        require "views/front/user/page_not_found.php"; 
    }

      /*****************************************************************************/
      public function login_view()
      {
        require "views/front/user/connexion_view.php"; 
      }


   











}