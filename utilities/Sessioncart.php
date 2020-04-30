<?php 

class SessionCart
{
    
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!array_key_exists("cart", $_SESSION))
        {
            $_SESSION["cart"] = [];
          
        }
    }


    
    public function add($id_product,$quantity,$priceEach)
    {
        $_SESSION["cart"][$id_product] = ["quantity" => $quantity, "priceEach" => $priceEach];
    }

    public function get()
    {
        if(!empty($_SESSION["cart"]))
        {
            return $_SESSION["cart"];
        }
    }

 


    public function delete($id_product)
    {
        unset($_SESSION["cart"][$id_product]);
    }




    public function empty()
    {
        unset($_SESSION["cart"]);

    }
}