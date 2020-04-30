<?php


class SessioncartController
{


    public function add()
    {

        if(!empty($_POST['id_product']) && !empty($_POST['quantity']) && !empty($_POST['priceEach']))
        {
            var_dump( $_POST);
            $cart = new SessionCart();
            $cartContents[] = $cart->get();
           
            $id = htmlentities($_POST["id_product"]);

            $cart->add($id, $_POST['quantity'],$_POST['priceEach'] );
          
    
        }else{
                $flash =new SessionFlash();
                $flash->error("vous n'avez ajouté aucun article, réessayez");
            }
            
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }


/* ************************** */


    public function show()
    {
        
       
        $cart = new SessionCart(); 
        $cartContents= $cart->get(); 

        $images=[];
        $products = [];
        
        if($cartContents)
        {
            foreach($cartContents as $id_product => $value)
            {
                $products[]= Products::getProductsById($id_product);
                $images[]=Image::getOneByIdProduct($id_product); 
            }  
        }

        require "views/front/user/panier_view.php";
    }



    /* ************************** */

    public function delete()
    {  
        if(isset($_GET["id"]) && !empty($_GET["id"]))
        {
            $session = new SessionCart;
            $session-> delete($_GET["id"]);

            $flash =new SessionFlash();
            $flash->success("cet article a bien été supprimer de la liste");
        }
        
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    /* ************************** */


    /* ************************** */

    public function empty()
    {
      
           $session = new SessionCart;
           $session-> empty();
            $flash =new SessionFlash();
            $flash->warning("vous venez de vider votre panier");
        
       header("Location: ".$_SERVER["HTTP_REFERER"]);
       
    }

}


