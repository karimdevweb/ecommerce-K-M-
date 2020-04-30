<?php 



class Sessionfavoris
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) session_start();

        if(!array_key_exists("favoris",$_SESSION))
        {
            $_SESSION["favoris"]= [];
        }
    }

    

    public function add($id_product)
    {
        array_push($_SESSION["favoris"],$id_product);

    }


    public function get()
    {
        if(!empty($_SESSION["favoris"]))
        {
            return $_SESSION["favoris"];
        }
    }


    public function delete($id_product)
    {
        $id = array_search($id_product,$_SESSION["favoris"]);
        unset($_SESSION["favoris"][$id]);
    }


    public function empty()
    {
        unset($_SESSION["favoris"]);
    }
}

