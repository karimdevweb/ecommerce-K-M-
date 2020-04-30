<?php 

class SessionfavorisController
{

    public function add()
    {
    
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {  

            $id= htmlentities($_GET["id"]);
            $session = new Sessionfavoris;

            $favoris =$session->get();
            if(in_array($id,$favoris))
            {
                $session->delete($id);
            }else
            {
                 $session->add($id);
            }  
           

        }
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }



    public function show()
    {
       
             $images=[];
             $products=[];
             $sessions = new Sessionfavoris;
             $favoris=$sessions->get();
             if(is_array($favoris))
             {
                  foreach ($favoris as $favoris) 
                    {
                        $products[]= Products::getProductsById($favoris);
                    }
             }
            
             foreach ($products as $product)
             {
                 $images[]=Image::getOneByIdProduct($product["id"]);
             }
    
           
        require "views/front/user/favoris_view.php"; 
    }



    public function delete()
    {
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $session = new Sessionfavoris;
           $session->delete($_GET["id"]);
             $flash =new SessionFlash();
             $flash->warning("le produit vient d'être supprimé de la liste");
        }
        
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }


    public function empty()
    {
        
       
             $session = new Sessionfavoris;
             $session->empty();
             $flash =new SessionFlash();
             $flash->warning("la liste des favoris vient d'être vidée");
       
             header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
}